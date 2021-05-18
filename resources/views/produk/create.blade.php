@extends('layouts.material')

@section('title')
Tambah Produk
@endsection

@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2> <small>Lengkapi form dibawah</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                action="{{ route('produk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Toko<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select name="id_toko" id="id_toko" class="form-control">
                            @foreach($toko as $row)
                                <option value="{{$row->id}}">{{$row->nama_toko}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Photo Produk<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" id="last-name" name="photo" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Produk<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="first-name" name="nama_produk" required="required" class="form-control ">
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deskripsi <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea type="text" id="last-name" name="deskripsi" required="required"
                            class="form-control"></textarea>
                    </div>
                </div>

                <div class="item form-group has-feedback">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="number" name="harga" class="form-control has-feedback-left" id="inputSuccess2">
                        <span class="form-control-feedback left" aria-hidden="true">IDR</span>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penilaian<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="first-name" name="rating" required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Stok<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="first-name" name="stok" required="required" class="form-control ">
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
