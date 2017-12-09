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
            <form class="form-horizontal"  action="{{ route('admin.master.type-rumah.store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type" class="col-sm-2 control-label">Type</label>

                <div class="col-sm-8">
                  <input id="type" name="type" type="text" class="form-control" placeholder="Type Rumah" value="{{ old('type') }}" required="">

                  @if ($errors->has('type'))
                      <span class="help-type">
                          <strong>{{ $errors->first('type') }}</strong>
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