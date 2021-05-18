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
                <a href="ojol_detail/create"><i class="fa fa-plus"></i>Tambah</button>
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
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ojol_detail as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($ojol_detail->perpage() * ($ojol_detail->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->transaksi->delivery->produk->nama_produk }}</td>
                            <td>{{ $row->transaksi->delivery->customer->nama }}</td>
                            <td>{{ $row->transaksi->delivery->tujuan }}</td>
                            <td>{{ $row->transaksi->delivery->alamat }}</td>
                            <td>{{ $row->transaksi->jumlah_pesan }}</td>
                            <td>{{ $row->transaksi->tgl_pemesanan }}</td>
                            <td>{{ $row->transaksi->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ojol_detail->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
