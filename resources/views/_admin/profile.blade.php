@extends('_admin._layouts.app')
@section('title', 'Profile')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <x-_admin.messages />
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-8">
                    <div class="card card-primary card-outline" style="border-top: 3px solid #DEB886;">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="col-6 card-title">Edit Profile</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <x-_admin.form>
                                @slot('route') {{ route('admin.profile.update', $profile->id) }} @endslot
                                @slot('method') POST @endslot
                                @slot('csrf')
                                    @csrf
                                    @method('PUT')
                                @endslot
                
                                @slot('formContent')
                                    <div class="row">
                                        <div class="col-12 text-center mb-2">
                                            <img src="{{ $profile->photo ?? 'https://ui-avatars.com/api/?name='.$profile->name }}" class="img-circle text-center" alt="img">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>E-Mail<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email"  value="{{ $profile->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="number" class="form-control" name="phone"  value="{{ $profile->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Pilih
                                                </a>
                                            </span>
                                            <input id="thumbnail1" class="form-control" type="text" name="photo" value="{{ $profile->photo }}">
                                        </div>
                                        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                                    </div>

                                    <input type="hidden" name="role" value="admin">
                                    <div class="form-group">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="status">
                                            <option value="active" @if($profile->status === 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($profile->status === 'inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                @endslot
                            </x-_admin.form>
                        </div>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="card card-primary card-outline" style="border-top: 3px solid #DEB886;">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="col-6 card-title">Edit Password</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <x-_admin.form>
                                @slot('route') {{ route('admin.password-update', $profile->id) }} @endslot
                                @slot('method') POST @endslot
                                @slot('csrf')
                                    @csrf
                                    @method('POST')
                                @endslot
                
                                @slot('formContent')
                                    <div class="form-group">
                                        <label>Password Lama<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Konfirmasi Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                @endslot
                            </x-_admin.form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
</div>
@endsection