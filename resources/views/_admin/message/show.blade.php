@extends('_admin._layouts.app')
@section('title', 'Pesan')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pesan
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item"><a href="{{ route('admin.message.index') }}">Pesan</a></li>
            <li class="breadcrumb-item active">{{ $message->subject }}</li>
        @endslot

        @slot('cardTitle')
            Pesan
        @endslot

        @slot('cardBody')
        <div class="card-body">
            <div class="mailbox-read-info">
                <h5>{{ $message->subject }}</h5>
                <h6>
                    From: {{ $message->name }}
                    <span class="mailbox-read-time float-right">{{ $message->created_at->format('d F Y H:i:s') }}</span>
                </h6>
            </div>
            <div class="mailbox-read-message">
                <p>{{ $message->message }}</p>
            </div>
            <div class="card-footer">
                {{-- <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                </div> --}}
                <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
        @endslot
    </x-_admin.page-content>
@endsection
