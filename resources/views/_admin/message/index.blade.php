@extends('_admin._layouts.app')
@section('title', 'Pesan')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Pesan
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Pesan</li>
        @endslot

        @slot('cardTitle')
            Daftar Pesan
        @endslot

        @slot('cardBody')
        <div class="card-body">

            <div class="card-body p-0">        
                <div class="float-right"> 1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                    </div>    
                </div>
                
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($messages as $m)
                            <tr>
                                <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" value="" id="check1">
                                        <label for="check1"></label>
                                    </div>
                                </td>
                                <td class="mailbox-name">
                                    <a href="{{ route('admin.message.show', $m->id) }}">
                                        @if($m->read_at == NULL)
                                            <b>{{ $m->name }}</b>
                                        @else
                                            {{ $m->name }}
                                        @endif
                                    </a>
                                </td>
                                <td class="mailbox-subject">
                                    <a href="{{ route('admin.message.show', $m->id) }}" style="color: black;">
                                        @if($m->read_at == NULL) 
                                            <b>{{ $m->subject }}</b> 
                                        @else 
                                            {{ $m->subject }} 
                                        @endif
                                        - {{ $m->message }}
                                    </a>
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">{{ $m->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection
