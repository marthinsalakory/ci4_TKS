<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Pengguna">Pengguna</a></li>
                        <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                            <h3 class="card-title">Tambah pengguna</h3>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        </div>
                                        <input required type="text" class="form-control">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Nomor Telephone:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input required type="number" name="no_telp" class="form-control">
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
                                        <input required type="email" name="Email" class="form-control">
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
                                        <input required type="text" name="username" class="form-control">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- IP mask -->
                                <div class="form-group">
                                    <label>Password:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input autocomplete="off" type="password" name="password" class="form-control" required>
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