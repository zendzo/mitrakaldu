@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              {{ $page_title }}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Jenis Kelamin</th>
                  <th>Status Menikah</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @if(!is_null($users))
                    @foreach($users as $user)
                     <tr>
                        <td><a href="{{ url('/user/profile',$user->id) }}">{{ $user->first_name }}</a></td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->gender->gender }}</td>
                        <td>{{ $user->marriedStatus->status }}</td>
                        <td>
                          @if ($user->active)
                            <a class="btn btn-primary btn-xs">Aktif</a>
                          @else
                            <a class="btn btn-danger btn-xs">Unaktif</a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>

            <div class="box-footer clearfix">
              <a class="btn btn-success" href="{{ route('admin.pelanggan.create')}}"><span class="fa fa-plus fa-fw"></span>&nbsp;Tambah Baru</a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection