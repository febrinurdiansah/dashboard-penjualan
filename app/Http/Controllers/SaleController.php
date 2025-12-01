<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // Filter tanggal
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = Sale::query();

        if ($start && $end) {
            $query->whereBetween('tanggal_penjualan', [$start, $end]);
        }

        $sales = $query->orderBy('tanggal_penjualan')->get();

        // Total penjualan
        $total_penjualan = $query->sum(DB::raw('jumlah * harga'));

        // Data untuk grafik
        $chartData = Sale::select(
            DB::raw('tanggal_penjualan as tgl'),
            DB::raw('SUM(jumlah * harga) as total')
        )
        ->when($start && $end, function ($q) use ($start, $end) {
            $q->whereBetween('tanggal_penjualan', [$start, $end]);
        })
        ->groupBy('tanggal_penjualan')
        ->orderBy('tanggal_penjualan')
        ->get();

        return view('dashboard', compact('sales', 'total_penjualan', 'chartData'));
    }
}
