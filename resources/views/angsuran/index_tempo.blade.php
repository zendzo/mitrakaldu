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
                  <td>Tagihan</td>
                </tr>
                </thead>
                <tbody>
                  @foreach($angsuran as $item)
                    <tr>
                      <td><a href="{{ url('/user/profile',$item->user->id) }}">{{ $item->user->first_name }}</a></td>
                      <td><a href="{{ route('admin.rumah.show',$item->rumah->id) }}">{{ $item->rumah->type->type }} Blok .{{ $item->rumah->block }} No .{{ $item->rumah->no }}</a></td>
                      <td>{{ $item->kode }}</td>
                      <td>{{ $item->jumlah }}</td>
                      <td>
                        @if ($item->completed)
                          <a href="#" class="btn btn-success" style="width: 100%;">Terverifikasi</a>
                        @else
                          <a href="#" class="btn btn-danger" style="width: 100%;">Belum Verifikasi</a>
                        @endif
                      </td>
                      <td>{{ $item->tanggal_tempo }}</td>
                      <td>{{ $item->tanggal_bayar }}</td>
                      <!-- button action -->
                      <td width="10%" class="text-center">
                        <a class="btn btn-primary" href="{{ route('admin.angsuran.invoice',$item->id) }}">
                          <span class="fa fa-send fa-fw"></span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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