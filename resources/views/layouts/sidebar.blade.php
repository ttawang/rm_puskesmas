    <!-- Brand Logo -->
    <p href="index3.html" class="brand-link">
      <img src="AdminLTE-3.1.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Rekam Medis</span>
    </p>
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="{{url('pasien/kunjungan-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Kunjungan Pasien</p>
                </a>
              </li>    
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('pasien/data-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Data Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('tindakan/medical-record')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Medical Record</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!--a href="./index.html" class="nav-link active"-->
                <a href="{{url('tindakan/tindakan-pasien')}}" class="nav-link">
                  <i class="fas fa-user-edit"></i>
                  <p>Tindakan Pasien</p>
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
                  <p>Data Dokter</p>
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
                  <p>Data Unit</p>
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
                  <p>Data Jenis Pemeriksaan</p>
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
                  <p>Data Pemeriksaan</p>
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
                  <p>Data Diagnosa</p>
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
                  <p>Data Obat</p>
                </a>
              </li>    
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>