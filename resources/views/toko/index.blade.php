@extends('layouts.material')

@section('title')
Halaman Toko
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Toko</h2>
            <div class="nav navbar-right panel_toolbox">
                <!-- <a href="toko/create"><i class="fa fa-plus"></i>Tambah</button> -->
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Photo </th>
                            <th class="column-title">Nama Toko </th>
                            <th class="column-title">Nama Pemilik </th>
                            <th class="column-title">Alamat Toko </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toko as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($toko->perpage() * ($toko->currentPage() -1)) }}
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('/storage/images/toko/'.$row->photo) }}"
                                    width="50px" />
                            </td>
                            <td>{{ $row->nama_toko }}</td>
                            <td>{{ $row->nama_pengelola }}</td>
                            <td>{{ $row->alamat }}</td>
                            <!-- <td>
                                <form method="post" action="{{ route('toko.destroy', [$row->id]) }}"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('toko.edit',[$row->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $toko->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
