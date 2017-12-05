@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <!-- /.box-header --> 
          <div class="box-body">
            <form class="form-horizontal"  action="{{ route('user.angsuran.store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
                <label for="kode" class="col-sm-2 control-label">Kode</label>

                <div class="col-sm-8">
                  <input name="rumah_id" type="text" hidden="" value="{{ Auth::user()->rumah->id }}">
                  <input name="user_id" type="text" hidden="" value="{{ Auth::id() }}">
                  <input id="kode" name="kode" type="text" class="form-control" placeholder="Kode"
                  value="{{ strtoupper(str_random('6')) }}" readonly="">

                  @if ($errors->has('kode'))
                      <span class="help-kode">
                          <strong>{{ $errors->first('kode') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                <label for="jumlah" class="col-sm-2 control-label">jumlah</label>

                <div class="col-sm-8">
                  <input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="Jumlah" value="{{ old('jumlah') }}" required="numeric">

                  @if ($errors->has('jumlah'))
                      <span class="help-block">
                          <strong>{{ $errors->first('jumlah') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('tanggal_bayar') ? ' has-error' : '' }}">
                <label for="tanggal_bayar" class="col-sm-2 control-label">Tanggal Pem.</label>

                <div class="col-sm-8">
                  <input id="tanggal_bayar" name="tanggal_bayar" type="text" class="form-control" 
                  value="{{ Date('d-m-Y') }}" readonly="">

                  @if ($errors->has('tanggal_bayar'))
                      <span class="help-block">
                          <strong>{{ $errors->first('tanggal_bayar') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label for="location" class="col-sm-2 control-label">location</label>

                <div class="col-sm-8">
                  <input id="location" name="location" type="file">

                  @if ($errors->has('location'))
                      <span class="help-block">
                          <strong>{{ $errors->first('location') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                  <button type="reset" class="btn btn-primary"><i class="fa fa-trash-o"></i> Cancel</button>
                </div>
              </div>
            </form>
          </div>           
          </div>
          <!-- /.box -->
          <!-- form start -->

  </div>
</div>
@endsection