@extends('template.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/produk/filter')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama">
                           </div>
                           <div class="form-group">
                                <label for="" class="control-label">Stok</label>
                                <input type="text" class="form-control" stok="stok">
                           </div>
                           <div class="form-group">
                                <label for="" class="control-label">Harga Min</label>
                                <input type="text" class="form-control" harga_min="harga_min">
                           </div>
                           <div class="form-group">
                                <label for="" class="control-label">Harga Max</label>
                                <input type="text" class="form-control" harga_max="harga_stok">
                           </div>
                           <button class="btn btn-dark float-right"><i class="fa fa-search"></i> Filter</button>
                        </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Product
                        <a href="{{url('admin/produk/create')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah Data </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Berat</th>
                            </thead>
                            <tbody>
                                @foreach($list_produk as $produk)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('admin/produk', $produk->id)}}" class="btn btn-dark"><i class="fa fa-info"></i></a>
                                            <a href="{{url('admin/produk', $produk->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            @include('template.utils.delete', ['url' => url('admin/produk', $produk->id)])
                                        </div>
                                    </td>
                                    <td>{{$produk->nama}}</td>
                                    <td>{{$produk->harga}}</td>
                                    <td>{{$produk->stok}}</td>
                                    <td>{{$produk->berat}}</td>
                                </tr>
                                @endforeach
                            </tbody>                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection