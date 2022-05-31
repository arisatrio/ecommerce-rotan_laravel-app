@extends('_admin._layouts.app')
@section('title', 'Pengguna')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Tambah Pengguna
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Tambah Pengguna</li>
            <li class="breadcrumb-item active">Edit Tambah Pengguna</li>
        @endslot

        @slot('cardTitle')
            Edit Tambah Pengguna
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.users.store') }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('POST')
                @endslot

                @slot('formContent')
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone"  value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label>Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                        <input id="thumbnail1" class="form-control" type="text" name="photo">
                    </div>
                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
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
        $(document).ready(function() {
        $('#summary').summernote({
            placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush