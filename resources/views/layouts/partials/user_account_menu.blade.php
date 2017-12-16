<!-- User Account Menu -->
<li class="dropdown user user-menu">
    @if (Auth::check())
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="{{ asset("AdminLTE/dist/img/user-avatar.png") }}" class="user-image" alt="User Image"/>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        @if (Auth::check())
            <span class="hidden-xs">{{ Auth::user()->fullName() }}</span>
        @endif
    </a>
    @else
    <!-- Menu Toggle Button -->
    <a href="{{ route('login') }}">
        Login
    </a>
    @endif
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="{{ asset("AdminLTE/dist/img/user-avatar.png") }}" class="img-circle" alt="User Image" />
            <p>
                @if (Auth::check())
                    {{ Auth::user()->fullName() }}
                    <small>{{ Auth::user()->role->name }}</small>
                    <small>{{ Auth::user()->updated_at->diffForHumans() }}</small>
                @endif
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ url('/user/profile',Auth::id()) }}" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</li>