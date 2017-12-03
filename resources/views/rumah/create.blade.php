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
            <form class="form-horizontal"  action="{{ route('admin.rumah.store') }}" method="POST">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('product_type_id') ? ' has-error' : '' }}">
                <label for="rumah_type_id" class="col-sm-2 control-label">Tipe Rumah</label>

                <div class="col-sm-8">
                 <select class="form-control" name="rumah_type_id">
                    @foreach ($type_rumah as $type)
                      <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('product_type_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('rumah_type_id') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}">
                <label for="block" class="col-sm-2 control-label">Block</label>

                <div class="col-sm-8">
                  <input id="block" name="block" type="text" class="form-control" placeholder="Block" value="{{ old('block') }}">

                  @if ($errors->has('block'))
                      <span class="help-block">
                          <strong>{{ $errors->first('block') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
                <label for="no" class="col-sm-2 control-label">No</label>

                <div class="col-sm-8">
                  <input id="no" name="no" type="text" class="form-control" placeholder="No Rumah" value="{{ old('no') }}">

                  @if ($errors->has('no'))
                      <span class="help-block">
                          <strong>{{ $errors->first('no') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('subsidi') ? ' has-error' : '' }}">
                <label for="subsidi" class="col-sm-2 control-label">Status Subsidi</label>

                <div class="col-sm-8">
                 <select class="form-control" name="subsidi">
                      <option value="1">Subsidi</option>
                      <option value="0">Nonsubsidi</option>
                  </select>

                  @if ($errors->has('subsidi'))
                      <span class="help-block">
                          <strong>{{ $errors->first('subsidi') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                <label for="harga" class="col-sm-2 control-label">Harga</label>

                <div class="col-sm-8">
                  <input id="harga" name="harga" type="text" class="form-control" placeholder="Harga" value="{{ old('harga') }}">

                  @if ($errors->has('harga'))
                      <span class="help-block">
                          <strong>{{ $errors->first('harga') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('upload') ? ' has-error' : '' }}">
                <label for="upload" class="col-sm-2 control-label">upload</label>

                <div class="col-sm-8">
                  <input id="upload" name="upload" type="file">

                  @if ($errors->has('upload'))
                      <span class="help-block">
                          <strong>{{ $errors->first('upload') }}</strong>
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