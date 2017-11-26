<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="{{ asset('AdminLTE/dist/img/user-avatar.png') }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $user->fullName() }}</h3>

    <p class="text-muted text-center"></p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
        <b>Type : </b> <a class="pull-right">{{ $user->role->name }}</a>
      </li>
      <li class="list-group-item">
        <b>Kontak : </b> <a class="pull-right">{{ $user->phone }}</a>
      </li>
      <li class="list-group-item">
        <b>Bergabung : </b> <a class="pull-right">{{ $user->created_at->format('d-m-Y') }}</a>
      </li>
    </ul>

    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
  </div>
  <!-- /.box-body -->
</div>