@extends('layouts.material')

@section('title')
Halaman Invoice
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Pesanan</h2>
            <!-- <div class="nav navbar-right panel_toolbox">
                <a href="transaksi/create"><i class="fa fa-plus"></i>Tambah</button>
            </div> -->
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Produk Pesanan</th>
                            <th class="column-title">Nama Customer</th>
                            <th class="column-title">Tujuan</th>
                            <th class="column-title">Alamat </th>
                            <th class="column-title">Jumlah Pesan </th>
                            <th class="column-title">Tanggal Pemesanan </th>
                            <th class="column-title">Subtotal </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($transaksi->perpage() * ($transaksi->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->delivery->produk->nama_produk }}</td>
                            <td>{{ $row->delivery->customer->nama }}</td>
                            <td>{{ $row->delivery->tujuan }}</td>
                            <td>{{ $row->delivery->alamat }}</td>
                            <td>{{ $row->jumlah_pesan }}</td>
                            <td>{{ $row->tgl_pemesanan }}</td>
                            <td>{{ $row->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $transaksi->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
