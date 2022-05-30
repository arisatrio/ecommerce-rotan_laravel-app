@extends('_admin._layouts.app')
@section('title', 'Pengaturan')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pengaturan
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Website</li>
            <li class="breadcrumb-item active">Pengaturan</li>
        @endslot

        @slot('cardTitle')
            Edit Informasi Website
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <form action="{{ route('admin.settings.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label>Judul<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="short_des" value="{{ $data->short_des }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3">{{ $data->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Logo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                        <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{ $data->logo }}">
                    </div>
                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Foto <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Pilih
                                </a>
                            </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $data->photo }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                    <div class="form-group">
                        <label>Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                    </div>

                    <div class="form-group">
                        <label>E-mail<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                    </div>

                    <div class="form-group">
                        <label>No. Telepon<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </form>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection

@push('js-script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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