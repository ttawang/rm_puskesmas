    <!-- Brand Logo -->
    <p href="index3.html" class="brand-link">
        <img src="{{ url("AdminLTE-3.1.0/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Rekam Medis</span>
    </p>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if (Auth::user()->role == "admin")
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>MASTER DATA</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{url('master/data-unit')}}" class="nav-link">
                    <i class="fas fa-user-edit"></i>
                    Ruangan
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{url('master/data-dokter')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Dokter
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/data-diagnosa')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Diagnosa Penyakit
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/data-pemeriksaan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Tindakan
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/data-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Obat
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tindakan/medical-record')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Tindakan Medical Cek
                </a>
              </li>
            </ul>
          </li> --}}
                  <p>Tindakan Medical Cek</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/laporan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Laporan Pemeriksaan Laboratorium</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>PENGATURAN</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-user')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Pengguna
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/data-user')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Level Pengguna
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  REFERENSI
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Spesialis
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Desa/Kelurahan
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Kecamatan
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Kabupaten/Kota
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Jenis Pasien
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Golongan Darah
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Pekerjaan
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Status Keluarga
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/data-jenis-pemeriksaan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Jenis Tindakan
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/golongan-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Golongan Obat
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/satuan-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Satuan Obat
                </a>
              </li>
            </ul>
          </li> --}}
        @elseif (Auth::user()->role == "admin_bagian_poli")
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tindakan/tindakan-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  Tindakan Pasien
                </a>
              </li>
            </ul>
          </li>
        @elseif (Auth::user()->role == "admin_registrasi")
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pasien/registrasi-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Registrasi Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pasien/data-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif (Auth::user()->role == "admin_laboratorium")
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('laboratorium/pemeriksaan-lab')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Tindakan Laboratorium</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif (Auth::user()->role == "kepala_rekam_medis")
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('home')}}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/laporan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Sensus Harian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/laporan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
