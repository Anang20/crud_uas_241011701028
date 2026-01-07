<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function lapanganSummary()
    {
        $summary = Lapangan::select('kondisi', DB::raw('COUNT(*) as total'))
            ->groupBy('kondisi')
            ->pluck('total', 'kondisi');

        return response()->json([
            'Baik' => $summary['Baik'] ?? 0,
            'Rusak Ringan' => $summary['Rusak Ringan'] ?? 0,
            'Rusak Berat' => $summary['Rusak Berat'] ?? 0,
            'Perbaikan' => $summary['Perbaikan'] ?? 0,
            'Tidak Aktif' => $summary['Tidak Aktif'] ?? 0,
        ]);
    }
}
