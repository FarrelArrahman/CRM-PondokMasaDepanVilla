<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner" style="overflow: hidden;">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama ?? 'User' }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span class="ellipsis">
                            {{ Auth::user()->nama ?? 'User' }}
                            <span class="user-level">{{ ucfirst(Auth::user()->role ?? 'Guest') }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ (request()->is('*dashboard*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*user*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*periode*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-calendar"></i>
                        <p>Periode</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*responden*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <p>Responden</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*pertanyaan*')) ? 'active' : '' }}">
                    <a href="#pertanyaan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-question"></i>
                        <p>Pertanyaan</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*ulasan*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-comment"></i>
                        <p>Ulasan</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*hasil*')) ? 'active' : '' }}">
                    <a href="#hasil" class="collapsed" aria-expanded="false">
                        <i class="fas fa-chart-pie"></i>
                        <p>Hasil</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
