<li class="treeview {{ active(['admin.pelanggan.*']) }}">
<a href="#">
  <i class="fa fa-smile-o fa-fw" aria-hidden="true"></i>
    <span>PELANGGAN</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu ">
    <li class="{{ active(['admin.pelanggan.index']) }}"><a href="{{ route('admin.pelanggan.index') }}"><i class="fa fa-check"></i>Daftar Pelanggan</a></li>
    {{-- <li><a href="#"><i class="fa fa-credit-card"></i>Konfirmasi Pembayaran</a></li> --}}
    {{-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Persetujuan</a></li> --}}
  </ul>
</li>