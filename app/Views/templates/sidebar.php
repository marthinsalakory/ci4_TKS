        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/asset/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TKS UNPATTI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/asset/img/<?= user()->user_image; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= user()->nama_lengkap; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="/Galeri" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Galeri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Kalender
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <?php if (in_groups('admin') || in_groups('operator_fakultas') || in_groups('operator')) { ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>
                                        DATA KELAS
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if (in_groups('admin') || in_groups('operator')) { ?>
                                        <li class="nav-item">
                                            <a href="/Fakultas" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Data Fakultas</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if (in_groups('admin') || in_groups('operator_fakultas')) { ?>
                                        <li class="nav-item">
                                            <a href="/Jurusan" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Data Jurusan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Kuliah" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Mata Kuliah</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (!in_groups('operator')) { ?>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        JURNAL PERKULIAHAN
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/Jurnal/" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lihat Semua Jurnal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Lihat / Matakuliah
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <?php $pe = new \App\Models\kuliahModel(); ?>
                                        <?php $per = $pe->findAll(); ?>
                                        <?php foreach ($per as $p) { ?>
                                            <?php if (user()->fakultas == $p['fakultas']) { ?>
                                                <?php if (user()->jurusan == $p['jurusan']) { ?>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="/Jurnal/kuliah/<?= $p['id']; ?>" class="nav-link">
                                                                <i class="fas fa-arrow-right nav-icon"></i>
                                                                <p>
                                                                    <?= $p['nama']; ?>
                                                                </p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/Jurnal/tambah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Jurnal</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (in_groups('operator')) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        OPERATOR FAKULTAS
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/Pengguna" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kelola Operator Fakultas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/Pengguna/tambah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Operator Fakultas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } elseif (in_groups('operator_fakultas')) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        MAHASISWA
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/Pengguna" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kelola Mahasiwa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/Pengguna/tambah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Mahasiswa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } else if (in_groups('admin')) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        SEMUA PENGGUNA
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/Pengguna" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lihat Semua</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/Pengguna/tambah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Pengguna Baru</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    DOKUMEN
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/lockscreen.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lihat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Dokumen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">TENTANG</li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Tentang Kami
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Hubungi_Kami" class="nav-link">
                                <i class="nav-icon fas fa-phone-square-alt"></i>
                                <p>
                                    Hubungi Kami
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>