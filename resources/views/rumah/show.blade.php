@extends('layouts.master')

@section('content')
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-home"></i> Rumah : {{ $rumah->type->type }},Blok {{ $rumah->block }}.
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
            <strong>{{ $rumah->perumahan->nama }} - {{ $rumah->perumahan->alamat }}</strong>
            <strong>{{ $rumah->type->type }}, {{ $rumah->block }}.</strong><br>
            Blok {{ $rumah->block }} No. {{ $rumah->no }}<br>
            Subisidi : {{ $rumah->subisidi }}<br>
            Harga : {{ $rumah->harga }}<br>
            DP (10%) : {{ $rumah->deposit }}<br>
            Angsuran : {{ $rumah->angsuran }}<br>
            @isset ($rumah->bookedBy)
                Calon Pembeli  : <a href="{{ url('/user/profile',$rumah->bookedBy->id) }}">{{ $rumah->bookedBy->first_name }}</a><br>
            @endisset
          </address>
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 ">
          <img src="{{ asset($rumah->location) }}" alt="" style="width: 100%;">
        </div>
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cicilan Ke :</th>
              <th>Kode Pembayaran :</th>
              <th>Tanggal Tempo:</th>
              <th>Tanggal Bayar:</th>
              <th>Verifikasi :</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($rumah->cicilan as $cicilan)
                <tr>
                  <td>1</td>
                  <td>{{ $cicilan->kode }}</td>
                  <td>{{ $cicilan->tanggal_tempo }}</td>
                  <td>{{ $cicilan->tanggal_bayar }}</td>
                  <td>{{ $cicilan->completed }}</td>
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
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Rekapitulasi s/d {{ Date('d-m-Y') }}</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total:</th>
                <td>{{ $rumah->cicilan->sum('jumlah') }}</td>
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
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
</section>
@endsection