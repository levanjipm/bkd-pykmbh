<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url()}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('data/pns')}}"><i class="fa fa-user fa-fw"></i> Data PNS</a>
            </li>
			@if(checkAdmin())
            <li>
                <a href="#"><i class="fa fa-cubes fa-fw"></i> Data Referensi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
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
			@endif
            <li>
                <a href="{{url('data/pns/banding')}}"><i class="fa fa-users fa-fw"></i> Perbandingan PNS</a>
            </li>
            <li>
                <a href="{{url('kgb/hitung')}}"><i class="fa fa-money fa-fw"></i> Kenaikan Gaji Berkala</a>
            </li>
            <li>
                <a href="{{url('struktur-organisasi')}}"><i class="fa fa-sitemap fa-fw"></i> Struktur Organisasi</a>
            </li>
            @if(checkAdmin())
             <li>
                <a href="{{url('user')}}"><i class="fa fa-users fa-fw"></i> Manajemen User</a>
            </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Laporan Total<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('laporan/jender/rekap')}}">Rekapitulasi Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/diklat/rekap')}}">Rekapitulasi Diklat</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/diklat-jender/rekap')}}">Rekapitulasi Diklat per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/golongan/rekap')}}">Rekapitulasi Golongan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/golongan-jender/rekap')}}">Rekapitulasi Golongan per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/pendidikan/rekap')}}">Rekapitulasi Pendidikan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/pendidikan-jender/rekap')}}">Rekapitulasi Pendidikan per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/eselon/rekap')}}">Rekapitulasi Eselon</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/eselon-jender/rekap')}}">Rekapitulasi Eselon per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan/komposisi-eselon/rekap')}}">Rekapitulasi Komposisi Eselon</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Laporan Eselon dan JFU<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/jender')}}">Rekapitulasi Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/diklat')}}">Rekapitulasi Diklat</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/diklat-jender')}}">Rekapitulasi Diklat per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/golongan')}}">Rekapitulasi Golongan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/golongan-jender')}}">Rekapitulasi Golongan per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/pendidikan')}}">Rekapitulasi Pendidikan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-esl-jfu/rekap/pendidikan-jender')}}">Rekapitulasi Pendidikan per Jender</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Laporan JFT<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('laporan-jft/rekap/jender')}}">Rekapitulasi Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/diklat')}}">Rekapitulasi Diklat</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/diklat-jender')}}">Rekapitulasi Diklat per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/golongan')}}">Rekapitulasi Golongan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/golongan-jender')}}">Rekapitulasi Golongan per Jender</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/pendidikan')}}">Rekapitulasi Pendidikan</a>
                    </li>
                    <li>
                        <a href="{{url('laporan-jft/rekap/pendidikan-jender')}}">Rekapitulasi Pendidikan per Jender</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{url('berita')}}"><i class="fa fa-newspaper-o"></i> Berita</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>