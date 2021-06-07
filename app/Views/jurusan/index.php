<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jurusan</h1><br>
                    <div class="card-header-action">
                        <!-- <a href="/Kelas/tambah"> -->
                        <!-- <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Fakultas Baru</button> -->
                        <?php if (in_groups('admin')) { ?>
                            <form action="/jurusan/tambah" method="post">
                                <div class="input-group">
                                    <input type="hidden" name="fakultas_id" value="<?= user()->fakultas; ?>">
                                    <input type="text" name="nama_jurusan" placeholder="Nama Jurusan ..." class="form-control" required>
                                    <select name="fakultas" id="" class="form-control">
                                        <option value="">Fakultas : </option>
                                        <?php foreach ($fakultas as $f) : ?>
                                            <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Tambah Jurusan Baru</button>
                                    </span>
                                </div>
                            </form>
                        <?php } else { ?>
                            <form action="/jurusan/tambah" method="post">
                                <div class="input-group">
                                    <input type="hidden" name="fakultas_id" value="<?= user()->fakultas; ?>">
                                    <input type="text" name="nama_jurusan" placeholder="Nama Jurusan ..." class="form-control" required>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Tambah Jurusan Baru</button>
                                    </span>
                                </div>
                            </form>
                        <?php } ?>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/fakultas">Data Fakultas</a></li>
                        <li class="breadcrumb-item active">Data Jurusan</li>
                        <li class="breadcrumb-item"><a href="/kuliah">Mata Kuliah</a></li>
                    </ol>
                </div>
            </div>
        </div>
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
                            <h3 class="card-title">Data Jurusan</h3>
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
                                        <?php if (in_groups('admin')) { ?>
                                            <th>FAKULTAS</th>
                                            <th>JURUSAN</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>JURUSAN</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jurusan as $jurusan) : ?>
                                        <?php if (in_groups('admin')) { ?>
                                            <tr>
                                                <td><?= $jurusan['nama_fakultas']; ?></td>
                                                <td><?= $jurusan['nama_jurusan']; ?></td>
                                                <td>
                                                    <form action="/Jurusan/hapus">
                                                        <input type="hidden" name="id" value="<?= $jurusan['id']; ?>">
                                                        <input type="hidden" name="nama" value="<?= $jurusan['nama_jurusan']; ?>">
                                                        <button class="btn btn-danger" onclick="return confirm('HAPUS JURUSAN <?= $jurusan['nama_jurusan']; ?>?');">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <?php if (user()->fakultas == $jurusan['fakultas_id']) { ?>
                                                <tr>
                                                    <td><?= $jurusan['nama_jurusan']; ?></td>
                                                    <td>
                                                        <form action="/Jurusan/hapus">
                                                            <input type="hidden" name="id" value="<?= $jurusan['id']; ?>">
                                                            <input type="hidden" name="nama" value="<?= $jurusan['nama_jurusan']; ?>">
                                                            <button class="btn btn-danger" onclick="return confirm('HAPUS JURUSAN <?= $jurusan['nama_jurusan']; ?>?');">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <?php if (in_groups('admin')) { ?>
                                            <th>FAKULTAS</th>
                                            <th>JURUSAN</th>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } else { ?>
                                            <th>JURUSAN</th>
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