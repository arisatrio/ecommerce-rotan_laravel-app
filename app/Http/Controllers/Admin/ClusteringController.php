<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Product;
use Phpml\Clustering\KMeans;

class ClusteringController extends Controller
{
    public function index(Request $request)
    {
        // $samples = [ 'Barang 1' => [1, 1], 'Barang 2' => [8, 7], 'Barang 3' => [1, 2], 'Barang 4' => [10, 11]];
        // $kmeans = new KMeans(2);
        // $cek = $kmeans->cluster($samples);
        // dd($cek);
        if($request->ajax()) {
            $data = Product::active()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('transaksi', function ($row) {
                    return '-';
                })
                ->addColumn('penjualan', function ($row) {
                    return '-';
                })
                ->addColumn('cluster', function ($row) {
                    return '-';
                })
                ->addColumn('action', function ($row) {
                    return '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('_admin.clustering.index');
    }
}
