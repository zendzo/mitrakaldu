<!-- About Me Box -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Detail Toko</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <strong><i class="fa fa-building margin-r-5"></i> Nama Toko</strong>

    <p>
      @if(!empty($user->store->nama))
        {{ $user->store->nama }}
      @else
        -
      @endif
    </p>
    <hr>

    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

    <p class="text-muted">
      @if(!empty($user->store->alamat))
        {{ $user->store->alamat }}
      @else
        -
      @endif
    </p>

    <hr>

    <strong><i class="fa fa-book margin-r-5"></i> Keterangan</strong>

    <p class="text-muted">
      @if(!empty($user->store->keterangan))
        {{ $user->store->keterangan }}
      @else
        -
      @endif
    </p>
  </div>
  <!-- /.box-body -->
</div>