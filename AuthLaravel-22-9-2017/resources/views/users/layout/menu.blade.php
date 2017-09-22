<nav class="navbar navbar-expand-lg navbar-info bg-light container-fluid">
    <a class="navbar-brand" href="{{ route('users.index') }}">
        <img src="admin_asset/img/logo.svg" width="30" height="30" alt="" class="d-inline-block align-top"> Admin Laravel
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="material-icons d-inline-block align-top">&#xE01D;</i>Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons d-inline-block align-top">&#xE7FD;</i> User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.index') }}"><i class="material-icons d-inline-block align-top">&#xE7FB;</i> List User</a>
                        <a class="dropdown-item" href="{{ route('users.create') }}"><i class="material-icons d-inline-block align-top">&#xE7F0;</i> Add User</a>
                    </div>
                </li>
            </ul>
            @guest
            @else
            <div class="dropdown mr-5">
                <a href="#" class="btn btn-outline-danger dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">{{ Auth::user()->last_name }}</a>   
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('admin/profile') }}"><i class="material-icons">&#xE869;</i> Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">&#xE8E4;</i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </div> 
            </div>
            @endguest
    </div>
</nav>