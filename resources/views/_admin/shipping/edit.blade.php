@extends('_admin._layouts.app')
@section('title', 'Kurir Ekspedisi')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Edit Kurir Ekspedisi
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Master Data</li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.shipping.index') }}">Kurir Ekspedisi</a></li>
            <li class="breadcrumb-item active">Edit Kurir Ekspedisi</li>
        @endslot

        @slot('cardTitle')
            Edit Kurir Ekspedisi
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <x-_admin.form>
                @slot('route') {{ route('admin.shipping.update', $shipping->id) }} @endslot
                @slot('method') POST @endslot
                @slot('csrf')
                    @csrf
                    @method('PUT')
                @endslot

                @slot('formContent')
                    <div class="form-group">
                        <label>Tipe<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="type" value="{{ $shipping->type }}">
                    </div>

                    <div class="form-group">
                        <label>Tujuan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="destination" value="{{ $shipping->destination }}">
                    </div>

                    <div class="form-group">
                        <label>Tarif<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" value="{{ $shipping->getAttributes()['price'] }}">
                    </div>

                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select class="custom-select" name="status">
                            <option value="active" @if($shipping->status === 'active') selected @endif>Active</option>
                            <option value="inactive" @if($shipping->status === 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @endslot
            </x-_admin.form>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection