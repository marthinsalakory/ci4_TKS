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
                        <h1>Operator Fakultas</h1><br>
                    <?php } elseif (in_groups('operator_fakultas')) { ?>
                        <h1>Mahasiswa</h1><br>
                    <?php } else { ?>
                        <h1>Pengguna</h1><br>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if (in_groups('operator')) { ?>
                            <li class="breadcrumb-item"><a href="/Pengguna">Kelola Operator Fakultas</a></li>
                            <li class="breadcrumb-item active">Tambah Operator Fakultas</li>
                        <?php } elseif (in_groups('operator_fakutas')) { ?>
                            <li class="breadcrumb-item"><a href="/Pengguna">Kelola Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Tambah Mahasiswa</li>
                        <?php } else { ?>
                            <li class="breadcrumb-item"><a href="/Pengguna">Pengguna</a></li>
                            <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <?php if (in_groups('operator')) { ?>
                                <h3 class="card-title">Tambah Oprator Fakultas</h3>
                            <?php } elseif (in_groups('operator_fakultas')) { ?>
                                <h3 class="card-title">Tambah Mahasiswa</h3>
                            <?php } else { ?>
                                <h3 class="card-title">Tambah pengguna</h3>
                            <?php } ?>

                        </div>
                        <div class="card-body">
                            <form action="/Pengguna/save" method="POST">
                                <div class"form-group">
                                    <label>Nama Lengkap:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        </div>
                                        <input name="nama_lengkap" type="text" value="<?= old('nama_lengkap'); ?>" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_lengkap'); ?>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <?php if (!in_groups('operator_fakultas')) { ?>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Nama Fakultas:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></i></span>
                                            </div>
                                            <select name="fakultas" id="" class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>">
                                                <option value=""></option>
                                                <?php foreach ($fakultas as $f) : ?>
                                                    <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('fakultas'); ?>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Jurusan:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></i></span>
                                            </div>
                                            <select name="jurusan" id="" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>">
                                                <option value=""></option>
                                                <?php foreach ($jurusan as $j) : ?>
                                                    <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jurusan'); ?>
                                            </div>
                                        </div>

                                        <!-- /.input group -->
                                    </div>
                                <?php } ?>


                                <?php if (in_groups('admin') || in_groups('operator_fakultas')) { ?>
                                    <div class="form-group">
                                        <?php if (in_groups('operator_fakultas')) { ?>
                                            <label>Jabatan Mahasiswa:</label>
                                        <?php } else if (in_groups('admin')) { ?>
                                            <label>Level Pengguna:</label>
                                        <?php } ?>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></i></span>
                                            </div>
                                            <select name="level" id="" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>">
                                                <option value=""></option>
                                                <?php if (in_groups('operator_fakultas')) { ?>
                                                    <option value="4">Ketua Tingkat</option>
                                                    <option value="5">Mahasiswa Biasa</option>
                                                <?php } else { ?>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Operator Pusdatin</option>
                                                    <option value="3">Operator Fakultas</option>
                                                    <option value="4">Ketua Tingkat</option>
                                                    <option value="5">Mahasiswa Biasa</option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jurusan'); ?>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                <?php } ?>

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Nomor Telephone:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input name="no_telp" type="number" value="<?= old('no_telp'); ?>" name="no_telp" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_telp'); ?>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- IP mask -->
                                <div class="form-group">
                                    <label>Email:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input name="email" type="email" value="<?= old('email'); ?>" name="Email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- IP mask -->
                                <div class="form-group">
                                    <label>Username:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="username" value="<?= old('username'); ?>" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            Matakuliah <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a type="button" href="/Pengguna" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?= $this->endSection(); ?>