<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if (in_groups('operator')) { ?>
                        <h1>Kelola Operator Fakultas</h1><br>
                    <?php } elseif (in_groups('operator_fakultas')) { ?>
                        <h1>Kelola Mahasiswa</h1><br>
                    <?php } else { ?>
                        <h1>Pengguna</h1><br>
                    <?php } ?>
                    <div class="card-header-action">
                        <a href="/Pengguna/tambah">
                            <?php if (in_groups('operator')) { ?>
                                <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Operator Fakultas</button>
                            <?php } elseif (in_groups('operator_fakultas')) { ?>
                                <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Mahasiswa</button>
                            <?php } else { ?>
                                <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Pengguna Baru</button>
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if (in_groups('operator')) { ?>
                            <li class="breadcrumb-item active">Kelola Operator Fakultas</li>
                            <li class="breadcrumb-item"><a href="/Pengguna/tambah">Tambah Operator Fakultas</a></li>
                        <?php } elseif (in_groups('operator_fakultas')) { ?>
                            <li class="breadcrumb-item active">Kelola Mahasiswa</li>
                            <li class="breadcrumb-item"><a href="/Pengguna/tambah">Tambah Mahasiswa</a></li>
                        <?php } else { ?>
                            <li class="breadcrumb-item active">Pengguna</li>
                            <li class="breadcrumb-item"><a href="/Pengguna/tambah">Tambah Pengguna</a></li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (in_groups('operator')) { ?>
                                <h3 class="card-title">Operator Fakultas</h3>
                            <?php } elseif (in_groups('operator_fakultas')) { ?>
                                <h3 class="card-title">Tambah Mahasiswa</h3>
                            <?php } else { ?>
                                <h3 class="card-title">Semua Pengguna</h3>
                            <?php } ?>
                        </div>
                        <div class="container">
                            <div class="col"><br>
                                <li><b>Password default = username pengguna tersebut</b></li>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary">
                                        <?php if (in_groups('admin')) { ?>
                                            <th>Nama lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>jabatan</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php }
                                        if (in_groups('operator')) { ?>
                                            <th>Nama lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>Nama lengkap</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                            <th>jabatan</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php dd($users); ?>
                                    <?php if (in_groups('admin')) { ?>
                                        <?php foreach ($users as $users) : ?>
                                            <tr>
                                                <td><?= $users['nama_lengkap']; ?></td>
                                                <td><?= $users['username']; ?></td>
                                                <td><?= $users['email']; ?></td>
                                                <td><?= $users['description']; ?></td>
                                                <td><?= $users['nama_fakultas']; ?></td>
                                                <td><?= $users['nama_jurusan']; ?></td>
                                                <td>
                                                    <form action="/Pengguna/hapus">
                                                        <input type="hidden" name="id" value="<?= $users['usersid']; ?>">
                                                        <input type="hidden" name="nama" value="<?= $users['nama_lengkap']; ?>">
                                                        <button class="btn btn-danger" onclick="return confirm('HAPUS <?= $users['nama_lengkap']; ?>?');"><span class="fa fa-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } elseif (in_groups('operator')) { ?>
                                        <?php foreach ($users as $users) : ?>
                                            <?php if ($users['id_group'] == 3) { ?>
                                                <tr>
                                                    <td><?= $users['nama_lengkap']; ?></td>
                                                    <td><?= $users['username']; ?></td>
                                                    <td><?= $users['email']; ?></td>
                                                    <td><?= $users['nama_fakultas']; ?></td>
                                                    <td><?= $users['nama_jurusan']; ?></td>
                                                    <td>
                                                        <form action="/Pengguna/hapus">
                                                            <input type="hidden" name="id" value="<?= $users['usersid']; ?>">
                                                            <input type="hidden" name="nama" value="<?= $users['nama_lengkap']; ?>">
                                                            <button class="btn btn-danger" onclick="return confirm('HAPUS <?= $users['nama_lengkap']; ?>?');"><span class="fa fa-trash"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <?php foreach ($users as $users) : ?>
                                            <?php if ($users['id_group'] == 4 || $users['id_group'] == 5) { ?>
                                                <tr>
                                                    <td><?= $users['nama_lengkap']; ?></td>
                                                    <td><?= $users['username']; ?></td>
                                                    <td><?= $users['email']; ?></td>
                                                    <td><?= $users['description']; ?></td>
                                                    <td><?= $users['nama_fakultas']; ?></td>
                                                    <td><?= $users['nama_jurusan']; ?></td>
                                                    <td>
                                                        <form action="/Pengguna/hapus">
                                                            <input type="hidden" name="id" value="<?= $users['usersid']; ?>">
                                                            <input type="hidden" name="nama" value="<?= $users['nama_lengkap']; ?>">
                                                            <button class="btn btn-danger" onclick="return confirm('HAPUS <?= $users['nama_lengkap']; ?>?');"><span class="fa fa-trash"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <?php if (in_groups('admin')) { ?>
                                            <th>Nama lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>jabatan</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php }
                                        if (in_groups('operator')) { ?>
                                            <th>Nama lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>Nama lengkap</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                            <th>jabatan</th>
                                            <th>fakultas</th>
                                            <th>jurusan</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->



    <?= $this->endSection(); ?>