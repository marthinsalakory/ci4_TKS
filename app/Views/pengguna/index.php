<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna</h1><br>
                    <div class="card-header-action">
                        <a href="/Pengguna/tambah">
                            <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Pengguna Baru</button>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pengguna</li>
                        <li class="breadcrumb-item"><a href="/Pengguna/tambah">Tambah Pengguna</a></li>
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
                            <h3 class="card-title">Semua Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Nama lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th><span class="fa fa-cog"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <th>Nama lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th><span class="fa fa-cog"></span></th>
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