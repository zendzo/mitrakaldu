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
                  <td>User</td>
                  <td>Rumah</td>
                  <td>Kode</td>
                  <td>Jumlah</td>
                  <td>Completed</td>
                  <td>Tgl. Temp</td>
                  <td>Tgl. Bayar</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                  @foreach($angsuran as $item)
                    <tr>
                      <td><a href="{{ url('/user/profile',$item->user->id) }}">{{ $item->user->first_name }}</a></td>
                      <td><a href="{{ route('admin.rumah.show',$item->rumah->id) }}">{{ $item->rumah->type->type }} Blok .{{ $item->rumah->block }} No .{{ $item->rumah->no }}</a></td>
                      <td>{{ $item->kode }}</td>
                      <td>{{ $item->jumlah }}</td>
                      <td>{{ $item->completed }}</td>
                      <td>{{ $item->tanggal_tempo }}</td>
                      <td>{{ $item->tanggal_bayar }}</td>
                      <!-- button action -->
                      <td width="10%" class="text-center">
                        <a class="btn btn-xs btn-info" href="{{ route('admin.rumah.show',$item->rumah->id ) }}">
                          <span class="fa fa-info fa-fw"></span>
                        </a>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.rumah.edit',$item->id) }}">
                          <span class="fa fa-pencil fa-fw"></span>
                        </a>
                        <form method="POST" action="{{ route('admin.rumah.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
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