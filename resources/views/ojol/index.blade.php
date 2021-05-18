@extends('layouts.material')

@section('title')
Halaman Ojek
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Ojek</h2>
            <div class="nav navbar-right panel_toolbox">
                <!-- <a href="ojol/create"><i class="fa fa-plus"></i>Tambah</button> -->
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Photo Pengendara</th>
                            <th class="column-title">Photo Kendaraan</th>
                            <th class="column-title">Nama Pengendara </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Jenis Kendaraan </th>
                            <th class="column-title">Nomor Kendaraan </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ojol as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($ojol->perpage() * ($ojol->currentPage() -1)) }}
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('/storage/images/ojol/'.$row->avatar) }}"
                                    width="50px" />
                            </td>
                            <td>
                                <img class="img-thumbnail"
                                    src="{{ asset('/storage/images/kendaraan/'.$row->photo_kendaraan) }}"
                                    width="50px" />
                            </td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->type_kendaraan }}</td>
                            <td>{{ $row->nomor_kendaraan }}</td>
                            <!-- <td>
                                <form method="post" action="{{ route('ojol.destroy', [$row->id]) }}"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('ojol.edit',[$row->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ojol->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
