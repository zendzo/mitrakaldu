@extends('layouts.master')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h4>{{ $page_title }}</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <td>Type Rumah</td>
              <td>Blok</td>
              <td>No</td>
              <td>Subsidi</td>
              <td>Harga</td>
              <td>Deposit</td>
              <td>Angusran</td>
              <td>User</td>
              <td>Action</td>
            </tr>
            </thead>
            <tbody>
              @foreach($unitrumah as $unit)
                <tr>
                  <td>{{ $unit->type->type }}</td>
                  <td>{{ $unit->block }}</td>
                  <td>{{ $unit->no }}</td>
                  <td>
                    @if ($unit->subsidi)
                      Subsidi
                    @else
                      Nonsubsidi
                    @endif
                  </td>
                  <td>{{ $unit->harga }}</td>
                  <td>{{ $unit->deposit }}</td>
                  <td>{{ $unit->angsuran }}</td>
                  <td>
                    @if (!empty($unit->bookedBy->first_name))
                      <a href="{{ url('/user/profile',$unit->bookedBy->id) }}">{{ $unit->bookedBy->first_name }}</a>
                    @else
                     -
                    @endif
                  </td>
                  <!-- button action -->
                  <td width="10%" class="text-center">
                    <a class="btn btn-xs btn-info" href="{{ route('admin.rumah.show',$unit->id) }}">
                      <span class="fa fa-info fa-fw"></span>
                    </a>
                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rumah.edit',$unit->id) }}">
                      <span class="fa fa-pencil fa-fw"></span>
                    </a>
                    <form method="POST" action="{{ route('admin.rumah.destroy',$unit->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-xs btn-danger">
                        <span class="fa fa-close fa-fw"></span>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a class="btn btn-success" href="{{ route('admin.rumah.create')}}"><span class="fa fa-plus fa-fw"></span>&nbsp;Tambah Baru</a>
        </div>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection