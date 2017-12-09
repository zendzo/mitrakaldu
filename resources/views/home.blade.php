@extends('layouts.master')

@section('content')
<div class="row">
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-home"></i> Rumah : {{ $booked_item->type->type }},Blok. {{ $booked_item->block }} No. {{ $booked_item->no }}
            <small class="pull-right">Date: {{ Date('d/m/Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Data Rumah :
          <address>
            <strong>{{ $booked_item->perumahan->nama }} - {{ $booked_item->perumahan->alamat }}</strong>
            <strong>{{ $booked_item->type->type }}, {{ $booked_item->block }}.</strong><br>
            Blok {{ $booked_item->block }} No. {{ $booked_item->no }}<br>
            Subisidi : {{ $booked_item->subisidi }}<br>
            Harga : {{ $booked_item->harga }}<br>
            DP (10%) : {{ $booked_item->deposit }}<br>
            Angsuran : {{ $booked_item->angsuran }}<br>
            @isset ($booked_item->bookedBy)
                Calon Pembeli  : <a href="{{ url('/user/profile',$booked_item->bookedBy->id) }}">{{ $booked_item->bookedBy->first_name }}</a><br>
            @endisset
          </address>
        </div>
      </div>
      <!-- /.row -->

<!-- Table row -->
<div class="row">
  <div class="col-xs-12 ">
    <img src="{{ asset($booked_item->location) }}" alt="" style="width: 100%;">
  </div>
  <div class="col-xs-12 table-responsive">
    <table class="table table-striped">
      <thead>
      <tr>
        <th>Cicilan Ke :</th>
        <th>Kode Pembayaran :</th>
        <th>Tanggal Bayar:</th>
        <th>Tanggal Tempo:</th>
        <th>Verifikasi :</th>
        <th>Subtotal</th>
      </tr>
      </thead>
      <tbody>
        @forelse ($booked_item->cicilan as $cicilan)
          <tr>
            <td>1</td>
            <td>{{ $cicilan->kode }}</td>
            <td>{{ $cicilan->tanggal_bayar }}</td>
            <td>{{ $cicilan->tanggal_tempo }}</td>
            <td>
              @if ($cicilan->completed)
                <a href="#" class="btn btn-success" style="width: 100%;">Verifikasi</a>
              @else
                <a href="#" class="btn btn-danger" style="width: 100%;"> Belum Verifikasi</a>
              @endif
            </td>
            <td>{{ $cicilan->jumlah }}</td>
          </tr>
        @empty
          {{-- empty expr --}}
        @endforelse
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Keterangan Pembayaran:</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Jika Dokumen Persyaratan Telah Diupload dan Diverifikasi, Pembayaran bisa di lakukan.
            Tangggal Pembayaran Selanjutnya Dihitung Dari Satu Bulan Setelah Pembayaran Pertama.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Rekapitulasi s/d {{ Date('d-m-Y') }}</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total:</th>
                <td>{{ $booked_item->cicilan->sum('jumlah') }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            @if (Auth::user()->requirementDocuments->count())
              <a href="{{ route('user.angsuran.create') }}" class="btn btn-success pull-right">
                <i class="fa fa-credit-card"></i> Upload Pembayaran
              </a>
            @endif
        </div>
      </div>

<!-- /.row -->
</section>
</div>

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
                  <th>Docs.</th>
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
                    <td>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#documentModalDialog-{{ $r->id }}">
                        <i class="fa fa-envelope"></i>
                      </a>
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
