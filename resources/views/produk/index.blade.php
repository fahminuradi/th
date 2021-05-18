@extends('layouts.material')

@section('title')
Halaman Produk
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Produk</h2>
            <div class="nav navbar-right panel_toolbox">
                <!-- <a href="produk/create"><i class="fa fa-plus"></i>Tambah</button> -->
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Photo Produk</th>
                            <th class="column-title">Nama Produk</th>
                            <th class="column-title">Nama Toko</th>
                            <th class="column-title">Harga </th>
                            <th class="column-title">Rating </th>
                            <th class="column-title">Stok </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($produk->perpage() * ($produk->currentPage() -1)) }}
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('/storage/images/produk/'.$row->photo) }}"
                                    width="50px" />
                            </td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->toko->nama_toko }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->rating }}</td>
                            <td>{{ $row->stok }}</td>
                            <!-- <td>
                                <form method="post" action="{{ route('produk.destroy', [$row->id]) }}"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('produk.edit',[$row->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produk->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
