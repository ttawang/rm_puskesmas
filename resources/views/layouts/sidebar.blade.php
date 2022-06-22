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
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>MASTER DATA</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-unit')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Ruangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-dokter')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Dokter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-diagnosa')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Diagnosa Penyakit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-pemeriksaan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Tindakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Obat</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('tindakan/medical-record')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Tindakan Medical Cek</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>LABORATORIUM</p>
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
                  <p>Tindakan Cek Laboratorium</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>LAPORAN</p>
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
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/laporan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Laporan Pemeriksaan Pasien</p>
                </a>
              </li>
            </ul>
          </li> --}}
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
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>PENGATURAN</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-user')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-user')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Level Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                  <p>REFERENSI</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Spesialis</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Desa/Kelurahan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Kabupaten/Kota</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Jenis Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Golongan Darah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href=" " class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Status Keluarga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/data-jenis-pemeriksaan')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Jenis Tindakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/golongan-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Golongan Obat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('master/satuan-obat')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Satuan Obat</p>
                </a>
              </li>
            </ul>
          </li> --}}
          @elseif (Auth::user()->role == "admin_bagian_poli")
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <p>RUANG BEROBAT POLI</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tindakan/tindakan-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Tindakan Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tindakan/request-ceklab')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Permintaan Cek Laboratorium</p>
                </a>
              </li>
            </ul>
          </li> --}}

          @elseif (Auth::user()->role == "admin_registasi")
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <p>REGISTRASI</p>
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
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
