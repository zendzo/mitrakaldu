@extends('layouts.master')

@section('jsPlugins')
<script>
  function printPage() {
      var css = '@page { size: landscape; }',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

      style.type = 'text/css';
      style.media = 'print';

      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }

      head.appendChild(style);
    window.print();
  }
</script>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3>{{ config('app.name') }}</h3><br>
          <h4>{{ $page_title }}</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <td>Data Rumah</td>
              <td>Data Angsuran</td>
              <td>Subsidi</td>
              <td>Harga</td>
              <td>Deposit</td>
              <td>Sisa DP</td>
              <td>Angusran</td>
              <td>Calon Pemb.</td>
            </tr>
            </thead>
            <tbody>
              @foreach($unitrumah as $unit)
                <tr>
                  <td>
                  	<address>
		            <strong>{{ $unit->perumahan->nama }}</strong>
		            <strong>{{ $unit->perumahan->alamat }}</strong>
		            <strong>{{ $unit->type->type }}, {{ $unit->block }}.</strong><br>
		            Blok {{ $unit->block }} No. {{ $unit->no }}<br>
		            Subisidi : {{ $unit->subisidi }}<br>
		            Harga : {{ $unit->harga }}<br>
		            DP (10%) : {{ $unit->deposit }}<br>
		            Angsuran : {{ $unit->angsuran }}<br>
		          </address>
                  </td>

                  <td>
                  	@foreach ($unit->cicilan as $key => $cicilan)
                  		Kode :{{ $cicilan->kode }} - {{ $cicilan->jumlah }}
                  	@endforeach
                  </td>

                  <td>
                    @if ($unit->subsidi)
                      Subsidi
                    @else
                      Nonsubsidi
                    @endif
                  </td>
                  <td>{{ $unit->harga }}</td>
                  <td>{{ $unit->deposit }}</td>
                  <td>{{ $unit->deposit - $unit->cicilan->sum('jumlah') }}</td>
                  <td>{{ $unit->angsuran }}</td>
                  <td>
                    @if (!empty($unit->bookedBy->first_name))
                      <a href="{{ url('/user/profile',$unit->bookedBy->id) }}">{{ $unit->bookedBy->first_name }}</a>
                    @else
                     -
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection