<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Product;

class ClusteringController extends Controller
{
    public function index(Request $request)
    {
        new Kmeans;
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
