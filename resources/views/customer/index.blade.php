@extends('layouts.material')

@section('title')
Halaman Ojek
@endsection

@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Customer</h2>
            <div class="nav navbar-right panel_toolbox">
                <!-- <a href="customer/create"><i class="fa fa-plus"></i>Tambah</button> -->
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Photo Customer </th>
                            <th class="column-title">Nama Customer </th>
                            <th class="column-title">Email </th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $row)
                        <tr class="even pointer">
                            <td> {{ $loop->iteration + ($customer->perpage() * ($customer->currentPage() -1)) }}
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('/storage/images/customer/'.$row->avatar) }}"
                                    width="50px" />
                            </td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <!-- <td>
                                <form method="post" action="{{ route('customer.destroy', [$row->id]) }}"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('customer.edit',[$row->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customer->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
