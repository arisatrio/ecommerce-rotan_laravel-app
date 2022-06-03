<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

use App\http\Requests\Admin\ShippingStoreRequest;
use App\Models\Shipping;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Shipping::with('createdBy')->active()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('createdBy', function ($row) {
                    return $row->createdBy->name;
                })
                ->addColumn('status', function ($row) {
                    if($row->status === 'active') {
                        return '<span class="badge badge-success">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge badge-danger">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.shipping.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> </a>'; 
                    $delete = '<a href="javascript:void(0)" onclick="delete_shipping('.$row->id.')" class="btn btn-default btn-sm mx-2"><i class="fas fa-trash"></i></a>';
                    return $edit.$delete;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('_admin.shipping.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingStoreRequest $request)
    {
        Shipping::create($request->validated());

        Alert::success('Sukses', 'Data Ekspedisi berhasil ditambahkan');
        return redirect()->route('admin.shipping.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('_admin.shipping.edit', compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingStoreRequest $request, Shipping $shipping)
    {
        $shipping->update($request->validated());

        Alert::success('Sukses', 'Data Ekspedisi berhasil diperbaharui');
        return redirect()->route('admin.shipping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();

        return response()->json([
            'message'   => 'success'
        ]);
    }
}
