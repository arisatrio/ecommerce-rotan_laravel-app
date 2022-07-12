<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;

use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductPhotos;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Product::with('productPhotosPrimary')->active()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    return '<img src="'.$row->productPhotosPrimary->photo.'" class="img-rounded" alt="User Image" style="max-height: 100px; max-width: 100px;">';
                })
                ->addColumn('discount', function ($row) {
                    return $row->discountPrice.'<span class="badge badge-danger ml-2">'.$row->discount.'</span>';
                })
                ->addColumn('category', function ($row) {
                    return '<span class="badge badge-warning">'.$row->category->name.'</span>';
                })
                ->addColumn('status', function ($row) {
                    if($row->status === 'active') {
                        return '<span class="badge badge-success">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge badge-danger">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.product.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> </a>'; 
                    $delete = '<a href="javascript:void(0)" onclick="delete_product('.$row->id.')" class="btn btn-default btn-sm mx-2"><i class="fas fa-trash"></i></a>';
                    return $edit.$delete;
                })
                ->rawColumns(['photo', 'discount', 'category', 'status', 'action'])
                ->make(true);
        };

        return view('_admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::active()->get();

        return view('_admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $productRequest = collect($request->validated())->except(['primary_photo', 'photos'])->toArray();
        $photosRequest  = collect($request->validated())->only(['primary_photo', 'photos']);
        $photos = collect(explode(',', $photosRequest['photos']));
        $photos->put('primary', $photosRequest['primary_photo']);
        
        $product = Product::create($productRequest);

        foreach($photos as $key => $p) {    
            if($key !== 'primary') {
                $product->productPhotos()->create([
                    'photo'    => $p,
                ]);
            } else {
                $product->productPhotos()->create([
                    'photo'     => $p,
                    'is_primary' => true,
                ]);
            }
        }

        Alert::success('Sukses', 'Data Produk berhasil ditambahkan');
        return redirect()->route('admin.product.index');
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
    public function edit(Product $product)
    {
        $categories = ProductCategory::active()->get();

        return view('_admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        if($request->primary_photo) {
            $photosRequest  = collect($request->validated())->only(['primary_photo']);
            $photos         = collect($photosRequest);
            $primaryPhoto   = $product->productPhotos->where('is_primary', 1)->first();
            $primaryPhoto->update([
                'photo'         => $photos['primary_photo'],
            ]);
        }
        if($request->photos) {
            $photosRequest  = collect($request->validated())->only(['photos']);
            $photos         = collect(explode(',', $photosRequest['photos']));
            $productPhotos  = $product->productPhotos()->where('is_primary', 0)->get();
            foreach($photos as $p) {
                foreach($productPhotos as $prod) {
                    $prod->update([
                        'photo' => $p,
                    ]);
                }
            }
        }

        Alert::success('Sukses', 'Data Produk berhasil diperbaharui');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message'   => 'success'
        ]);
    }
}
