@extends('_admin._layouts.app')
@section('title', 'Kategori')

@section('content')
    <x-_admin.page-content>
        @slot('title')
         Kategori
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Kategori</li>
            <li class="breadcrumb-item active">Edit Kategori</li>
        @endslot

        @slot('cardTitle')
            Edit Kategori
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.category.update', $category->id) }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('PUT')
                @endslot

                @slot('formContent')
                    <div class="form-group">
                        <label>Nama Kategori<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3">{{ $category->description }}</textarea>
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
                        <label for="is_parent">Is Parent</label><br>
                        <input type="hidden" name="is_parent" value="0">
                        <input type="checkbox" name='is_parent' id='is_parent' value='1' @if ($category->is_parent) checked @endif> Yes
                    </div>

                    <div class="form-group @if (!$category->parent_id) d-none @endif" id='parent_cat_div'>
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">--Select parent category--</option>
                            @foreach($categories as $c)
                                <option value='{{ $c->id }}' @if ($category->parent_id == $c->id) selected @endif>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active" @if($category->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if($category->status === 'inactive') selected @endif>Inactive</option>
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

        $('#is_parent').change(function(){
            var is_checked = $('#is_parent').prop('checked');
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }
            else{
                $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>
@endpush