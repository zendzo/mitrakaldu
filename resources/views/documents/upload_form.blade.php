@extends('layouts.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{ $page_title }}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" action="{{ route('user.documents.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="box-body">

      <div class="form-group">
        <label for="name">Jenis Dokumen</label>
        <select name="document_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required="">
            @foreach($documentType as $type)
              <option value="{{ $type->id }}">{{ $type->name }} - ({{ $type->keterangan }})</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="location">File input</label>
        <input type="file" id="location" name="location">

        <p class="help-block">Example block-level help text here.</p>
      </div>

      <div class="form-group">
        <label for="name">Keterangan Dokumen</label>
        <textarea class="form-control" name="keterangan" id="keterangan" ></textarea>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection