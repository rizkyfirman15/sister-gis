<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="">
        <img src="{{ asset('img/logogis.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">CURRICULUM GIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Curriculum')
                <li class="nav-item has-treeview" id="liDashboard">
                        <a href="#" class="nav-link" id="Dashboard">
                            <i class="nav-icon fas fa-home"></i>
                            <p> 
                                Dashboard
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link" id="Home">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link" id="AdminHome">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Admin Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview" id="liMasterData">
                        <a href="#" class="nav-link" id="MasterData">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('jadwal.index') }}" class="nav-link" id="DataJadwal">
                                    <i class="fas fa-calendar-alt nav-icon"></i>
                                    <p>TimeTable</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guru.index') }}" class="nav-link" id="DataGuru">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Teacher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelas.index') }}" class="nav-link" id="DataKelas">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Class</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('siswa.index') }}" class="nav-link" id="DataSiswa">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mapel.index') }}" class="nav-link" id="DataMapel">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Subject</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link" id="DataUser">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->role == "Admin")
                    <li class="nav-item has-treeview" id="liViewTrash">
                            <a href="#" class="nav-link" id="ViewTrash">
                                <i class="nav-icon fas fa-recycle"></i>
                                <p>
                                    View Trash
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="{{ route('jadwal.trash') }}" class="nav-link" id="TrashJadwal">
                                        <i class="fas fa-calendar-alt nav-icon"></i>
                                        <p>Schedule Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guru.trash') }}" class="nav-link" id="TrashGuru">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Teacher Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kelas.trash') }}" class="nav-link" id="TrashKelas">
                                        <i class="fas fa-home nav-icon"></i>
                                        <p>Class Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('siswa.trash') }}" class="nav-link" id="TrashSiswa">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Student Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mapel.trash') }}" class="nav-link" id="TrashMapel">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Subject Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.trash') }}" class="nav-link" id="TrashUser">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>User Trash</p>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                    @else
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('syllabus.index') }}" class="nav-link" id="DataSyllabus">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Syllabus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="DataSchemeOfWork">
                            <i class="fas fa-object-group nav-icon"></i>
                            <p>Scheme of Work</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lessonPlan.indexAdmin') }}" class="nav-link" id="DataLessonPlan">
                            <i class="fas fa-check-square nav-icon"></i>
                            <p>Lesson Plan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('guru.absensi') }}" class="nav-link" id="AbsensiGuru">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Teacher Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview" id="liNilai">
                        <a href="#" class="nav-link" id="Nilai">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Mark
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('ulangan-kelas') }}" class="nav-link" id="Ulangan">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Exam</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('sikap-kelas') }}" class="nav-link" id="Sikap">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Behavior</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('rapot-kelas') }}" class="nav-link" id="Rapot">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Report Card</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('predikat') }}" class="nav-link" id="Deskripsi">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Predicate Description</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pengumuman') }}" class="nav-link" id="Pengumuman">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Announcement</p>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 'Teacher' && Auth::user()->guru(Auth::user()->id_card))
                <li class="nav-item has-treeview">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absen.harian') }}" class="nav-link" id="AbsenGuru">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jadwal.guru') }}" class="nav-link" id="JadwalGuru">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>TimeTable</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('syllabus.guru') }}" class="nav-link" id="SyllabusGuru">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Syllabus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="DataSchemeOfWork">
                            <i class="fas fa-object-group nav-icon"></i>
                            <p>Scheme of Work</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lessonPlan.guru') }}" class="nav-link" id="LessonPlanGuru">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Lesson Plan</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview" id="liNilaiGuru">
                        <a href="#" class="nav-link" id="NilaiGuru">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Mark
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('ulangan.index') }}" class="nav-link" id="UlanganGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Entry Exam</p>
                                </a>
                            </li>
                            <!-- @if (
                                Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Religion / Pendidikan Agama" ||
                                Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Citizenship Education / Pendidikan Pancasila"
                            )
                                <li class="nav-item">
                                    <a href="{{ route('sikap.index') }}" class="nav-link" id="SikapGuru">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Entry Behavior</p>
                                    </a>
                                </li>
                            @else
                            @endif -->
                            <li class="nav-item">
                                <a href="{{ route('rapot.index') }}" class="nav-link" id="RapotGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Entry Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nilai.index') }}" class="nav-link" id="DesGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Predicate Description</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role == 'Student' && Auth::user()->siswa(Auth::user()->no_induk))
                <li class="nav-item has-treeview">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jadwal.siswa') }}" class="nav-link" id="JadwalSiswa">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>TimeTable</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('syllabus.siswa') }}" class="nav-link" id="SyllabusSiswa">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Syllabus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ulangan.siswa') }}" class="nav-link" id="UlanganSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Exam</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route('sikap.siswa') }}" class="nav-link" id="SikapSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Behavior</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="{{ route('rapot.siswa') }}" class="nav-link" id="RapotSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Report</p>
                        </a>
                    </li>
                @else
                    <li class="nav-item has-treeview">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>