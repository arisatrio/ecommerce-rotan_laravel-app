<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\ProductCategoryRequest;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = ProductCategory::with(['parent', 'createdBy'])->orderBy('parent_id')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('parent_id', function ($row) {
                    if ($row->parent_id === NULL) {
                        return '-';
                    } else {
                        return '<span class="badge badge-warning">'.$row->parent->name.'</span>';
                    }
                })
                ->addColumn('photo', function ($row) {
                    if ($row->photo) {
                        return '<img src="'.$row->photo .'" class="img-circle" alt="User Image" style="height: 30px; width: 30px;">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('created_by', function ($row) {
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
                    $edit = '<a href="'.route('admin.category.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> </a>'; 
                    $delete = '<a href="javascript:void(0)" onclick="delete_category('.$row->id.')" class="btn btn-default btn-sm mx-2"><i class="fas fa-trash"></i></a>';
                    return $edit.$delete;
                })
                ->rawColumns(['parent_id', 'photo', 'status', 'action'])
                ->make(true);
        }
        return view('_admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::where('is_parent', 1)->where('status', 'active')->get();

        return view('_admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->all();
        ProductCategory::create($data);

        Alert::success('Sukses', 'Data Kategori Produk berhasil ditambahkan');
        return redirect()->route('admin.category.index');
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
    public function edit(ProductCategory $category)
    {
        $categories = ProductCategory::parentCategory($category->id)->active()->get();

        return view('_admin.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $category)
    {
        $data = $request->all();;
        $category->update($data);

        Alert::success('Sukses', 'Data kategori produk berhasil diperbaharui');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
