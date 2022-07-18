@extends('_admin._layouts.app')
@section('title', 'Clustering')

@section('content')
    <x-_admin.page-content>
        @slot('title')
            Clustering
        @endslot

        @slot('breadcrumb')
            <li class="breadcrumb-item active">Clustering</li>
        @endslot

        @slot('cardTitle')
            Clustering Produk
        @endslot

        @slot('cardBody')
        <div class="card-body">
            
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success float-right"> Generate K-Means</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table id="datatables" class="table table-bordered">
                        <thead class="text-white text-center" style="background-color: #DEB886;">
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th>Produk</th>
                                <th>Total Transaksi</th>
                                <th>Total Penjualan</th>
                                <th>Random Centroid</th>
                                @foreach ($clustering as $cluster => $c)
                                <th>{{ $cluster }}</th>
                                @endforeach
                                <th style="width: 10%;">CLUSTER</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clustering as $cluster => $c)
                                @foreach ($c as $key => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $key }}</td>
                                        <td>{{ $data[0] }}</td>
                                        <td>{{ $data[1] }}</td>
                                        <td>[{{ $randomCentroid[$cluster][0] }} , {{ $randomCentroid[$cluster][1] }}]</td>
                                        @for ($i=0; $i<count($clustering); $i++)
                                        @php
                                            $posisi = [$data[0], $data[1]];
                                            $jarak = $euclidean->distance($randomCentroid[$cluster], $posisi);
                                        @endphp
                                            <td>{{ number_format($jarak, 5) }}</td>
                                        @endfor
                                        <td class="text-center">
                                            <span class="badge badge-primary">
                                                <h6>{{ $cluster }}</h6>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endslot
    </x-_admin.page-content>
@endsection