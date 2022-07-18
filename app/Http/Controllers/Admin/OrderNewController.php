<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Order;

class OrderNewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->ajax()) {
            $data = Order::with('user')->where('status', 'new')->get();
           
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return $row->created_at->format('d F Y');
                })
                ->addColumn('oleh', function($row) {
                    return $row->user->name;
                })
                ->addColumn('status', function ($row) {
                    if($row->payment_status === 'unpaid') {
                        return '<span class="badge badge-danger">BELUM BAYAR</span>';
                    } else {
                        return '<span class="badge badge-danger">BAYAR</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.product.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-eye"></i> Lihat Pesanan</a>'; 

                    return $edit;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('_admin.order.new');
    }
}
