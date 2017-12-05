<li class="treeview {{ active(['admin.angsuran.*']) }}">
<a href="#">
  <i class="fa fa-smile-o fa-fw" aria-hidden="true"></i>
    <span>ANGSURAN</span>
    <small class="label pull-right bg-red">{{ $angsuran_new->count() }}</small>
    <small class="label pull-right bg-blue">{{ $angsuran_completed->count() }}</small>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu ">
    <li class="{{ active(['admin.angsuran.index']) }}"><a href="{{ route('admin.angsuran.index') }}"><i class="fa fa-check"></i>Daftar Angsuran</a></li>
    <li class="{{ active(['admin.angsuran.tempo']) }}"><a href="{{ route('admin.angsuran.tempo') }}"><i class="fa fa-check"></i>Angsuran Jatuh Tempo</a></li>
    {{-- <li><a href="#"><i class="fa fa-credit-card"></i>Konfirmasi Pembayaran</a></li> --}}
    {{-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Persetujuan</a></li> --}}
  </ul>
</li>