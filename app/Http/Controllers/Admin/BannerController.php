<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;

use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Banner::with('createdBy')->active();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_by', function ($row) {
                    return $row->createdBy->name;
                })
                ->addColumn('photo', function ($row) {
                    if ($row->photo) {
                        return '<img src="'.$row->photo .'" class="img-circle" alt="User Image" style="height: 30px; width: 30px;">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('status', function ($row) {
                    if($row->status === 'active') {
                        return '<span class="badge badge-success">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge badge-danger">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.banner.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> </a>'; 
                    $delete = '<a href="javascript:void(0)" onclick="delete_banner('.$row->id.')" class="btn btn-default btn-sm mx-2"><i class="fas fa-trash"></i></a>';
                    return $edit.$delete;
                })
                ->rawColumns(['photo', 'status', 'action'])
                ->make(true);
        }
        return view('_admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
        Banner::create($data);

        Alert::success('Sukses', 'Data Banner berhasil ditambahkan');
        return redirect()->route('admin.banner.index');
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
    public function edit(Banner $banner)
    {
        return view('_admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->all();
        $banner->update($data);

        Alert::success('Sukses', 'Data Banner berhasil diperbaharui');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
