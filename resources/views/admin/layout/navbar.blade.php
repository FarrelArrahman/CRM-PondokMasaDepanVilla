<nav class="navbar navbar-header navbar-expand-lg bg-red">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'User' }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'User' }}" alt="image profile"
                                        class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->nama ?? 'Guest' }}</h4>
                                    <p class="text-muted">{{ Auth::user()->nim ?? '-' }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
