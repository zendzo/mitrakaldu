<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('AdminLTE/dist/img/user-avatar.png') }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->fullName() }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Type: {{ Auth::user()->role->name }}</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- if user is admin show menu -->
      @if(Auth::user()->role_id === 1)
        @include('admin.menu_pengguna')
        @include('admin.menu_rumah')
        @include('admin.menu_dokumen')
        @include('admin.menu_angsuran')
        @include('admin.menu_master_data')
      @endif

      <!-- user menu -->
      @if(Auth::user()->role_id != 1)
      
      @endif
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>