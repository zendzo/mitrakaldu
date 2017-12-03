<li class="treeview {{ active(['admin.rumah.*']) }}">
<a href="#">
  <i class="fa fa-smile-o fa-fw" aria-hidden="true"></i>
    <span>RUMAH</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu ">
    <li class="{{ active(['admin.rumah.index']) }}"><a href="{{ route('admin.rumah.index') }}"><i class="fa fa-check"></i>Daftar Unit</a></li>
    {{-- <li><a href="#"><i class="fa fa-credit-card"></i>Konfirmasi Pembayaran</a></li> --}}
    {{-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Persetujuan</a></li> --}}
  </ul>
</li>