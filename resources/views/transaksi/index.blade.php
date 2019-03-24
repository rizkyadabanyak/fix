@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h1>Pembelian</h1></center>

        <table class="responsive-table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Waktu Transaksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr onclick="window.location='{{ route('transaksi.show', $transaksi) }}'" style="cursor: pointer">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>Rp {{ $transaksi->total }}</td>
                    <td>Rp {{ $transaksi->total_pembayaran }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection