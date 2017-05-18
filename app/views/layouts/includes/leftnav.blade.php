<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url()}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cubes fa-fw"></i> Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{url('data/pns')}}">PNS</a>
                    </li>
                    <li>
                        <a href="{{url('data/skpd')}}">SKPD</a>
                    </li>
                    <li>
                        <a href="{{url('data/jabatan-struktural')}}">Jab. Struktural</a>
                    </li>
                    <li>
                        <a href="{{url('data/jabatan-fungsional')}}">Jab. Fungsional</a>
                    </li>
                    <li>
                        <a href="{{url('data/instansi')}}">Instansi</a>
                    </li>
                    <li>
                        <a href="{{url('data/pendidikan')}}">Pendidikan</a>
                    </li>
                    <li>
                        <a href="{{url('data/diklat')}}">Diklat</a>
                    </li>
                    <li>
                        <a href="{{url('data/pangkat')}}">Pangkat</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{url('data/pns/banding')}}"><i class="fa fa-users fa-fw"></i> Komparasi PNS</a>
            </li>
            <li>
                <a href="{{url('data/kgb')}}"><i class="fa fa-money fa-fw"></i> Data Kenaikan Gaji Berkala</a>
            </li>
            <li>
                <a href="{{url('struktur-organisasi')}}"><i class="fa fa-sitemap fa-fw"></i> Struktur Organisasi</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('laporan/duk')}}">Laporan DUK</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/bezeting')}}">Laporan Bezeting</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/bulanan')}}">Laporan Bulanan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>