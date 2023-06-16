<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if(Auth::user()->type == 0)                
                <li>
                    <a href="{{route('user.home')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->type == 1)
                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('peminjaman.index')}}" class="waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('pengembalian.index')}}" class="waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Pengembalian</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('petugas.index')}}" class="waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Petugas</span>
                    </a>
                </li>
    
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Data Buku</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('book.index')}}">Buku</a></li>
                        <li><a href="{{route('category.index')}}">Kategori</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Data Siswa</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('student.index')}}">Siswa</a></li>
                        <li><a href="{{route('rombel.index')}}">Rombel</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>