@extends('layouts.master')

@section('content')
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Dokumen Presyaratan KPR</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>ID</th>
                  <th>Dokumen Persyaratan</th>
                  <th>Tanggal Upload</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>User</th>
                  <th>Docs.</th>
                  <th>Action</th>
                </tr>
                @forelse ($RD as $r)
                  <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->documentType->name }} - {{ $r->documentType->keterangan }}</td>
                    <td>{{ $r->created_at->format('d-m-Y') }}</td>
                    <td>
                      @if ($r->approved)
                        <span class="label label-success">Diterima</span>
                      @else
                        <span class="label label-warning">Proses</span>
                      @endif
                    </td>
                    <td>{{ $r->keterangan }}</td>
                    <td><a href="{{ url('/user/profile',$r->user->id) }}">{{ $r->user->fullName() }}</a></td>
                    <td>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#documentModalDialog-{{ $r->id }}">
                        <i class="fa fa-envelope"></i>
                      </a>
                    </td>
                    <td>
                    	@if (!$r->approved)
                        <a href="{{ route('admin.documents.approved',$r->id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>
                    		<a href="{{ route('admin.documents.rejected',$r->id) }}" class="btn btn-danger"><i class="fa fa-ban"></i></a>
                    	@else
                        <a href="#" class="btn btn-warning disabled"><i class="fa fa-check"></i></a>
                    		<a href="#" class="btn btn-danger disabled"><i class="fa fa-ban"></i></a>
                    	@endif
                    </td>

                    @include('form_partials.document_modal_dialog')
                 </tr>
                @empty
                <tr>
                  <td colspan="5"><h3 class="text-center">empty</h3></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            </div>

            <div class="box-footer">
              <a class="btn btn-large btn-primary" href="{{ route('user.documents.index') }}"><i class="fa fa-fw fa-upload"></i> Upload</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
@endsection