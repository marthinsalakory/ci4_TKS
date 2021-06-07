<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mata Kuliah</h1><br>
                    <div class="card-header-action">
                        <!-- <a href="/Kelas/tambah"> -->
                        <!-- <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Fakultas Baru</button> -->
                        <form action="/kuliah/tambah" method="post">
                            <div class="input-group">
                                <input type="text" name="nama" placeholder="Mata Kuliah ..." class="form-control" required>
                                <input type="number" name="semester" placeholder="Semester ..." class="form-control" required>

                                <?php if (in_groups('admin')) { ?>
                                    <select name="fakultas" id="" class="form-control">
                                        <option value="">Fakultas :</option>
                                        <?php foreach ($fakultas as $fakultas) : ?>
                                            <option value="<?= $fakultas['id']; ?>">
                                                <?= $fakultas['nama_fakultas']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                        </option>
                                    </select>

                                    <select name="jurusan" id="" class="form-control">
                                        <option value="">Jurusan :</option>
                                        <?php foreach ($jurusan as $jurusan) : ?>
                                            <option value="<?= $jurusan['id']; ?>">
                                                <?= $jurusan['nama_jurusan']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                        </option>
                                    </select>
                                <?php } ?>

                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Tambah Mata Kuliah Baru</button>
                                </span>
                            </div>
                        </form>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/fakultas">Data Fakultas</a></li>
                        <li class="breadcrumb-item"><a href="/jurusan">Data Jurusan</a></li>
                        <li class="breadcrumb-item active">Mata Kuliah</li>
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
                            <h3 class="card-title">Mata Kuliah</h3>
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
                                        <?php if (in_groups('admin') || in_groups('operator')) { ?>
                                            <th>FAKULTAS</th>
                                            <th>JURUSAN</th>
                                            <th>MATA KULIAH</th>
                                            <th>SEMESTER</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>MATA KULIAH</th>
                                            <th>SEMESTER</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kuliah as $kuliah) : ?>
                                        <?php if (in_groups('admin') || in_groups('operator')) { ?>
                                            <tr>
                                                <td><?= $kuliah['nama_fakultas']; ?></td>
                                                <td><?= $kuliah['nama_jurusan']; ?></td>
                                                <td><?= $kuliah['nama']; ?></td>
                                                <td><?= $kuliah['semester']; ?></td>
                                                <td>
                                                    <form action="/Kuliah/hapus">
                                                        <input type="hidden" name="id" value="<?= $kuliah['id']; ?>">
                                                        <input type="hidden" name="nama" value="<?= $kuliah['nama']; ?>">
                                                        <button class="btn btn-danger" onclick="return confirm('HAPUS MATA KULIAH <?= $kuliah['nama']; ?>?');">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <?php if (user()->fakultas == $kuliah['k_f']) { ?>
                                                <?php if (user()->jurusan == $kuliah['k_j']) { ?>
                                                    <tr>
                                                        <td><?= $kuliah['nama']; ?></td>
                                                        <td><?= $kuliah['semester']; ?></td>
                                                        <td>
                                                            <form action="/Kuliah/hapus">
                                                                <input type="hidden" name="id" value="<?= $kuliah['id']; ?>">
                                                                <input type="hidden" name="nama" value="<?= $kuliah['nama']; ?>">
                                                                <button class="btn btn-danger" onclick="return confirm('HAPUS MATA KULIAH <?= $kuliah['nama']; ?>?');">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <?php if (in_groups('admin') || in_groups('operator')) { ?>
                                            <th>FAKULTAS</th>
                                            <th>JURUSAN</th>
                                            <th>MATA KULIAH</th>
                                            <th>SEMESTER</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>MATA KULIAH</th>
                                            <th>SEMESTER</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
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