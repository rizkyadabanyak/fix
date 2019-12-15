@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        Pembayaran
                    </div>
                    <div class="card-body">
                        <form action="{{route('transaksi.store')}}" method="post">
                            @csrf
                            <input type="hidden">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input  value="{{$itemkeranjangs->sum(function ($item){
                                                                                        return $item->harga * $item->keranjang->jumlah;
                                    })}}" name="total" placeholder="0" disabled required id="first_name2"  type="text" class="validate black-text" >
                                    <input type="hidden" name="total" value="{{$itemkeranjangs->sum(function ($item){
                                                                                        return $item->harga * $item->keranjang->jumlah;
                                    })}}">
                                     <label class="active black-text" for="first_name2">Total Bayar</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="total_pembayaran" id="first_name2"  type="number" class="validate black-text" min="{{$itemkeranjangs->sum(function ($item){
                                                                                        return $item->harga * $item->keranjang->jumlah;
                                    })}}"  required>

                                    <label class="active black-text" for="first_name2">Jumlah Bayar</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="total_pembayaran" id="first_name2"  name="date"  type="text" class="validate black-text" value="{{ date('d F Y') }}" disabled required>

                                    <label class="active black-text" for="first_name2">Tanggal</label>
                                </div>
                            </div>

                            <button type="submit" class="btn-floating btn-large  pulse btn-success float-right"><i class="material-icons">local_grocery_store
                                </i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        Roti
                    </div>
                    <div class="card-body">
                        <form action="{{ route('keranjang.store') }}" method="post">
                            @csrf
                            <input type="hidden" id="id_item" name="item_id">

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama_item" name="" placeholder="Pilih Roti..." readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn-floating btn-large purple lighten-3 pulse float-right" data-toggle="modal" data-target="#pilihBarang"><i class="material-icons">local_dining
                                            </i></button>
                                    </div>
                                </div>

                                <div class="modal fade" id="pilihBarang">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal">
                                                <h5 class="modal-title">Pilih Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <table >
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Roti</th>
                                                        <th scope="col">Rasa</th>
                                                        <th scope="col">Gambar</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">persediaan</th>
                                                        <th scope="col">Opsi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($items as $item)
                                                        <tr>
                                                            <th scope="col">{{$loop->iteration}}</th>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->kategori->nama}}</td>
                                                            <td>
                                                                <img src="{{asset($item->gambar)}}" width="50px" height="50px">
                                                            </td>
                                                            <td>Rp.{{$item->harga}}</td>
                                                            <td>{{$item->persediaan}}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"
                                                                onclick="
                                                                        $('#id_item').val('{{$item->id}}')
                                                                        $('#nama_item').val('{{$item->nama}}')
                                                                        $('#jumlah_item').attr('max','{{$item->persediaan}}')
                                                                        "
                                                                >pilih

                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" min="1" value="1" class="form-control" id="jumlah_item" name="jumlah" placeholder="Masukkan jumlah..." required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Unit</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-floating btn-large cyan pulse float-right"><i class="material-icons">add_circle_outline
                                </i></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>



        <table class="responsive-table">


        </table>
            <div class="row">
                @foreach($itemkeranjangs as $item)
                    <div class="col s12 m7">

                        <div class="card">

                            <div class="card-image">
                                <img class="materialboxed" height="200" width="200" src="{{asset($item->gambar)}}">
                                <span class="card-title">{{ $item->nama }}</span>
                                <a class="btn-floating halfway-fab waves-effect  purple lighten-3 center white-text pulse">{{ $item->keranjang->jumlah }}</a>
                            </div>
                            <div class="card-content">
                                <h3>{{ $item->harga * $item->keranjang->jumlah }}</h3>
                            </div>
                            <div class="card-action">
                                <a>{{ $item->harga }}</a>
                                <a>{{ $item->kategori->nama }}</a>

                                <a class="btn-floating btn-small cyan pulse float-lg-right" data-toggle="modal" data-target="#ubahJumlah{{ $loop->iteration }}"><i class="material-icons">edit</i></a>


                                <form action="{{route('keranjang.delete', $item->keranjang)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-floating btn-small red pulse float-right"><i class="material-icons">close</i></button>
                                </form>

                                <div class="modal fade" id="ubahJumlah{{ $loop->iteration }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Jumlah '{{ $item->nama }}'</h5>

                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('keranjang.update', $item->keranjang) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="number" min="1" max="{{ $item->persediaan }}" value="{{ $item->keranjang->jumlah }}" class="form-control" name="jumlah" placeholder="Masukkan jumlah..." required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Unit</span>
                                                                <button type="submit" class="btn btn-primary ">Ubah</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

    </div>



@endsection