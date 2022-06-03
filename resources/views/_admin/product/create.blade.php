@extends('_admin._layouts.app')
@section('title', 'Produk')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Tambah Produk
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Produk</li>
            <li class="breadcrumb-item active">Tambah Produk</li>
        @endslot

        @slot('cardTitle')
            Tambah Produk
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.product.store') }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('POST')
                @endslot

                @slot('formContent')

                    <div class="form-group">
                        <label for="parent_id">Kategori</label>
                        <select name="product_category_id" class="form-control">
                            <option value="">--Pilih kategori--</option>
                            @foreach($categories as $c)
                                <option value='{{$c->id}}'>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                    <div class="form-group">
                        <label>Foto Utama</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                            <input id="thumbnail1" class="form-control" type="text" name="primary_photo">
                        </div>
                    </div>

                    <div id="holder2" style="margin-top:15px;max-height:100px;"></div>
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
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Ringkasan<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="summary" rows="1">{{ old('summary') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Stok<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
                    </div>

                    <div class="form-group">
                        <label>Harga<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label>Diskon (%)</label>
                        <input type="number" class="form-control" name="discount" value="{{ old('discount') }}">
                    </div>

                    <div class="form-group">
                        <label for="is_parent">Tambahkan ke halaman utama</label><br>
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes             
                    </div>

                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
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
    </script>
@endpush