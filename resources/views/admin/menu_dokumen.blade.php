<li class="treeview {{ active(['admin.documents.*']) }}">
<a href="#">
  <i class="fa fa-smile-o fa-fw" aria-hidden="true"></i>
    <span>DOKUMEN</span>
    <span class="pull-right-container">
      <small class="label pull-right bg-red">{{ $documents_new->count() }}</small>
      <small class="label pull-right bg-blue">{{ $documents_approved->count() }}</small>
    </span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu ">
    <li class="{{ active(['admin.documents.index']) }}"><a href="{{ route('admin.documents.index') }}"><i class="fa fa-check"></i>Daftar Dokumen Persyaratan</a></li>
    {{-- <li><a href="#"><i class="fa fa-credit-card"></i>Konfirmasi Pembayaran</a></li> --}}
    {{-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Persetujuan</a></li> --}}
  </ul>
</li>