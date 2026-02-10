<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Operator;
use App\Models\Nilai;

class TopsisController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all()->keyBy('id');   // keyBy id for easy access
        $operators = Operator::all();

        // 1) Ambil matriks X (nilai asli)
        $X = [];
        foreach ($operators as $op) {
            foreach ($kriterias as $kId => $k) {
                $val = Nilai::where('operator_id', $op->id)
                            ->where('kriteria_id', $kId)
                            ->value('nilai') ?? 0;
                $X[$op->id][$kId] = (float) $val;
            }
        }

        // 2) Hitung pembagi (sqrt of sum squares) per kriteria => pembagi[j] = sqrt(sum_i x_ij^2)
        $pembagi = [];
        foreach ($kriterias as $kId => $k) {
            $sumSq = 0.0;
            foreach ($operators as $op) {
                $v = $X[$op->id][$kId] ?? 0.0;
                $sumSq += pow($v, 2);
            }
            $pembagi[$kId] = sqrt($sumSq);
            // safety: if pembagi == 0 set to 1 to avoid div0 (matches many Excel behaviors)
            if ($pembagi[$kId] == 0.0) $pembagi[$kId] = 1.0;
        }

        // 3) Matriks ternormalisasi R: r_ij = x_ij / pembagi_j
        $R = [];
        foreach ($operators as $op) {
            foreach ($kriterias as $kId => $k) {
                $R[$op->id][$kId] = $X[$op->id][$kId] / $pembagi[$kId];
            }
        }

        // 4) Matriks terbobot V: v_ij = r_ij * bobot_j
        // Important: gunakan bobot persis seperti di DB (5,5,5,4)
        $V = [];
        foreach ($operators as $op) {
            foreach ($kriterias as $kId => $k) {
                $w = (float) $k->bobot;
                $V[$op->id][$kId] = $R[$op->id][$kId] * $w;
            }
        }

        // 5) Solusi ideal A+ dan A- berdasarkan matriks V
// 5) Solusi ideal A+ dan A- berdasarkan matriks V
$Apos = []; $Aneg = [];

// PROTEKSI: Cek apakah data tersedia
if ($operators->isEmpty() || empty($V)) {
    return view('topsis.index', [
        'hasil' => [],
    ]);
}

foreach ($kriterias as $kId => $k) {
    $col = array_column($V, $kId);
    
    // Pastikan kolom ini ada nilainya sebelum di min/max
    if (empty($col)) {
        $Apos[$kId] = 0;
        $Aneg[$kId] = 0;
        continue;
    }

    if ($k->tipe === 'benefit') {
        $Apos[$kId] = max($col);
        $Aneg[$kId] = min($col);
    } else { // cost
        $Apos[$kId] = min($col);
        $Aneg[$kId] = max($col);
    }
}

        // 6) Hitung jarak D+ dan D- serta preferensi
        $results = [];
        foreach ($operators as $op) {
            $dPlus = 0.0;
            $dMinus = 0.0;
            foreach ($kriterias as $kId => $k) {
                $v = $V[$op->id][$kId];
                $dPlus += pow($v - $Apos[$kId], 2);
                $dMinus += pow($v - $Aneg[$kId], 2);
            }
            $dPlus = sqrt($dPlus);
            $dMinus = sqrt($dMinus);

            $pref = ($dPlus + $dMinus == 0.0) ? 0.0 : ($dMinus / ($dPlus + $dMinus));
$pref_truncate = floor($pref * 10000) / 10000;
            // simpan raw dan rounded (9 decimal) - Excel contohmu pakai 9 desimal
            $results[] = [
                'operator_id' => $op->id,
                'operator' => $op->nama,
                'dPlus' => $dPlus,
                'dMinus' => $dMinus,
                // raw preferensi (high precision)
                'pref_raw' => $pref,
                // tampilkan seperti Excel (9 desimal)
                'nilai' => $pref_truncate,
            ];
        }

        // 7) Urutkan descending by pref_raw (so ranking stable)
        usort($results, function($a, $b) {
            if ($b['pref_raw'] == $a['pref_raw']) return 0;
            return ($b['pref_raw'] < $a['pref_raw']) ? -1 : 1;
        });

        // 8) (Opsional) tambahkan ranking index
        foreach ($results as $i => &$r) {
            $r['rank'] = $i + 1;
        }
        unset($r);

        // Untuk debugging / audit: kirim semua matriks ke view jika perlu
        return view('topsis.index', [
            'hasil' => $results,
            'X' => $X,
            'pembagi' => $pembagi,
            'R' => $R,
            'V' => $V,
            'Apos' => $Apos,
            'Aneg' => $Aneg,
            'kriterias' => $kriterias,
            'operators' => $operators,
        ]);
    }
}
