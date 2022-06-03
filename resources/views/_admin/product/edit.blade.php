@extends('_admin._layouts.app')
@section('title', 'Produk')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Edit Produk
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
        @endslot

        @slot('cardTitle')
            Edit Produk
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.product.update', $product->id) }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('PUT')
                @endslot

                @slot('formContent')

                    <div class="form-group">
                        <label for="parent_id">Kategori</label>
                        <select name="product_category_id" class="form-control">
                            <option value="">--Pilih kategori--</option>
                            @foreach($categories as $c)
                                <option value='{{$c->id}}' @if($c->id === $product->product_category_id) selected @endif>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <img id="img1" src="{{ $product->productPhotosPrimary->photo }}" alt="" style="width: 150px; height: 150px;">
                    <div class="imgholder" id="holder1" style="margin-top:15px;max-height:100px;"></div>
                    <div class="form-group">
                        <label>Foto Utama</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                            <input id="thumbnail1" class="form-control" type="text" name="primary_photo" value="">
                        </div>
                    </div>


                    @foreach ($product->productPhotos as $item)
                        <img class="img2" src="{{ $item->photo }}" alt="" style="width: 100px; height: 100px;">
                    @endforeach
                    <div class="imgholder" id="holder2" style="margin-top:15px;max-height:100px;"></div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                            <input id="thumbnail2" class="form-control" type="text" name="photos">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Produk<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="form-group">
                        <label>Ringkasan<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="summary" rows="1">{{ $product->summary }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Stok<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
                    </div>

                    <div class="form-group">
                        <label>Harga<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="price" value="{{ $product->getAttributes()['price'] }}">
                    </div>

                    <div class="form-group">
                        <label>Diskon (%)</label>
                        <input type="number" class="form-control" name="discount" value="{{ $product->getAttributes()['discount'] }}">
                    </div>

                    <div class="form-group">
                        <label for="is_parent">Tambahkan ke halaman utama</label><br>
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name='is_featured' id='is_featured' value='1' @if($product->is_featured) checked @endif> Yes             
                    </div>

                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active" @if($product->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if($product->status === 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @endslot
            </x-_admin.form>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection

@push('js-script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>\
    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('image');
        $('#lfm2').filemanager('image');

        $(document).ready(function(){
            $('#holder1').on('DOMSubtreeModified', function(){
                $("#img1").hide();
            });
            $('#holder2').on('DOMSubtreeModified', function(){
                $(".img2").hide();
            });
        });
    </script>
@endpush