@extends('layouts.material')

@section('title')
Halaman Order
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Pesanan</h2> 
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
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delivery as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($delivery->perpage() * ($delivery->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->produk->nama_produk }}</td>
                            <td>{{ $row->customer->nama }}</td>
                            <td>{{ $row->tujuan }}</td>
                            <td>{{ $row->alamat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $delivery->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
