<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fakultas</h1><br>
                    <div class="card-header-action">
                        <!-- <a href="/Kelas/tambah"> -->
                        <!-- <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Fakultas Baru</button> -->
                        <form action="/fakultas/tambah" method="post">
                            <div class="input-group">
                                <input type="text" name="nama_fakultas" placeholder="Nama Fakultas ..." class="form-control" required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Tambah Fakultas Baru</button>
                                </span>
                            </div>
                        </form>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Fakultas</li>
                        <li class="breadcrumb-item"><a href="/jurusan">Data Jurusan</a></li>
                        <li class="breadcrumb-item"><a href="/kuliah">Mata Kuliah</a></li>
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
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-header">
                            <h3 class="card-title">Data Fakultas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-danger" colspan="5">
                                            PERHATIAN : PIKIRKAN TERLEBIH DAHULU SEBELUM MENGHAPUS DATA PADA TABEL INI, KARENA AKAN MEMPENGARUHI DATA INPUTAN SEMUA USER, UNTUK LEBIH BAIK SILAHKAN TANYAKAN KE DEVELOPER WEB INI.
                                        </th>
                                    </tr>
                                    <tr class="bg-primary">
                                        <th>FAKULTAS</th>
                                        <th><span class="fa fa-cog"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fakultas as $fakultas) : ?>
                                        <tr>
                                            <td><?= $fakultas['nama_fakultas']; ?></td>
                                            <td>
                                                <form action="/Fakultas/hapus">
                                                    <input type="hidden" name="id" value="<?//= $fakultas['id']; ?>">
                                                    <input type="hidden" name="nama" value="<?//= $fakultas['nama_fakultas']; ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('HAPUS FAKULTAS <?= $fakultas['nama_fakultas']; ?>?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <th>FAKULTAS</th>
                                        <th><span class="fa fa-cog"></span></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger" colspan="5">
                                            PERHATIAN : PIKIRKAN TERLEBIH DAHULU SEBELUM MENGHAPUS DATA PADA TABEL INI, KARENA AKAN MEMPENGARUHI DATA INPUTAN SEMUA USER, UNTUK LEBIH BAIK SILAHKAN TANYAKAN KE DEVELOPER WEB INI.
                                        </th>
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