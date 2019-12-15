@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h1>Detail</h1></center>
        <div class="float-right"><b>{{ date('d F Y', strtotime($transaksis->created_at)) }}</b></div>

        <table class="responsive-table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama Roti</th>
                <th scope="col">Rasa</th>
                <th scope="col">Harga(1 unit)</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Keseluruhan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis->details as $detail)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img class="responsive-img" src="{{ asset($detail->item->gambar) }}" width="50px" height="50px">
                    </td>
                    <td>{{ $detail->item->nama }}</td>
                    <td>{{ $detail->item->kategori->nama }}</td>

                    <td>Rp {{ $detail->item->harga }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp {{ $detail->total_keseluruhan }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection