@extends('_admin._layouts.app')
@section('title', 'Pengguna')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pengguna
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Akun</li>
            <li class="breadcrumb-item active">Pengguna</li>
            <li class="breadcrumb-item active">Edit Pengguna</li>
        @endslot

        @slot('cardTitle')
            Edit Pengguna
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.users.update', $user->id) }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('PUT')
                @endslot

                @slot('formContent')
                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active" @if($user->status == 'active') selected @endif>Active</option>
                            <option value="inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                @endslot
            </x-_admin.form>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection
