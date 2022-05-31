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
                    <div class="row">
                        <div class="col-12 text-center mb-2">
                            <img src="{{ $user->photo ?? 'https://ui-avatars.com/api/?name='.$user->name }}" class="img-circle text-center" alt="img">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input disabled type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail<span class="text-danger">*</span></label>
                        <input disabled type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon<span class="text-danger">*</span></label>
                        <input disabled type="number" class="form-control" name="phone"  value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Daftar<span class="text-danger">*</span></label>
                        <input disabled type="text" class="form-control" name="created_at" value="{{ $user->created_at->format('d F Y H:i:s') }}">
                    </div>
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
