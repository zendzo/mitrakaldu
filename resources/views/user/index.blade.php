@extends('layouts.master')

@section('content')
<div class="row">
@foreach ($rumah as $item)
<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
	      <a href="#">
	      	<img src="{{ asset($item->location) }}" class="img-thumbnail img-responsive" style="height: 250px; width: 350px;">
	      </a>
	      <div class="caption">
	        <h3>{{ $item->perumahan->nama }} Blok.{{ $item->block }} No.{{ $item->no }}</h3>
	        <p>Lokasi :{{ $item->perumahan->alamat }}</p>
	        <h4></h4>
	        <h4 class="text-primary">Rp.<span class="highlight">1</span>{{ $item->harga }}</h4>
	        <h5 class="text-success">DP : {{ $item->deposit }}</h5>
	        <h5 class="text-success">Booking Fee : {{ $item->angsuran }}</h5>
	        <h5 class="text-success">Cicilan DP : {{ $item->angsuran }}/bln</h5>
	        <p>
	        </p>
	        <p>
	        	@if (Auth::check())
	        		<a class="btn btn-large btn-danger" href="{{ route('user.booking.rumah',$item->id) }}">Booking!</a>
	        	@endif
	        	@if ($item->subsidi)
	        		<button class="btn btn-info disabled">SUBSIDI</button>
	        	@else
	        		<button class="btn btn-danger disabled">NONSUBSIDI</button>
	        	@endif
	        </p>
	        <p>
	        	<a href="{{ route('user.rumah.show',$item->id) }}" class="btn btn-primary" role="button" target="_blank">
	        		<span class="glyphicon glyphicon-search" aria-hidden="true"></span> | Lihat Detail
	        	</a>
	        </p>
	        
	    </div>
	</div>
</div>
@endforeach
</div>
@endsection