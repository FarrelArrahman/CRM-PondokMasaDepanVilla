<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
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
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*user*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*responden*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <p>Responden</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*pertanyaan*')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pertanyaan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-question"></i>
                        <p>Pertanyaan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pertanyaan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Tambah Pertanyaan</span>
                                </a>
                                <a href="#">
                                    <span class="sub-item">Daftar Pertanyaan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ (request()->is('*ulasan*')) ? 'active' : '' }}">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-comment"></i>
                        <p>Ulasan</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('*hasil*')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#hasil" class="collapsed" aria-expanded="false">
                        <i class="fas fa-chart-pie"></i>
                        <p>Hasil</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="hasil">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Lihat Hasil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
