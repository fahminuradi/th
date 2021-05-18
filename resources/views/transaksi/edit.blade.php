@extends('layouts.material')

@section('title')
Edit Toko
@endsection

@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2> <small>Silahkan ubah form dibawah</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                action="{{ route('toko.update',$toko->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pemiilik <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="first-name" name="nama_pengelola" value="{{$toko->nama_pengelola}}"
                            class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="email" id="first-name" name="email" value="{{$toko->email}}" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Toko <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="last-name" name="nama_toko" value="{{$toko->nama_toko}}"
                            class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label for="gambar_kategori" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <img class="img-thumbnail" src="{{ asset('/storage/images/toko/'.$toko->photo) }}"
                            width="50px" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Photo<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" id="last-name" value="{{$toko->photo}}" name="photo" class="form-control">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a class="btn btn-danger" href="/toko">Cancel</a>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
