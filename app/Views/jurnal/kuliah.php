<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jurnal</h1><br>
                    <div class="card-header-action">
                        <?php if (in_groups('keting') || in_groups('admin')) { ?>
                            <a href="/Jurnal/tambah">
                                <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Jurnal</button>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if (in_groups('keting') || in_groups('admin')) { ?>
                            <li class="breadcrumb-item active">Jurnal</li>
                            <li class="breadcrumb-item"><a href="/Jurnal/tambah">Tambah Data Jurnal</a></li>
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
                            <h3 class="card-title">Semua Jurnal</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>MATA KULIAH</th>
                                        <th>SEMESTER</th>
                                        <th>DOSEN PENGAJAR</th>
                                        <th>TANGGAL PERKULIAHAN</th>
                                        <th>WAKTU PERKULIAHAN</th>
                                        <th>PERTEMUAN KE-</th>
                                        <th>MEDIA PERKULIAHAN</th>
                                        <th>JENIS KEGIATAN PERKULIAHAN</th>
                                        <th>MATERI PERKULIAHAN</th>
                                        <th>JUMLAH KEHADIRAN</th>
                                        <th>NAMA PENGISI</th>
                                        <th>NIM PENGISI</th>
                                        <?php if (in_groups('keting') || in_groups('admin')) { ?>
                                            <th><span class="fa fa-cog"></span></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jurnal as $j) : ?>
                                        <?php if (user()->fakultas == $j['fakultas_id']) { ?>
                                            <?php if (user()->jurusan == $j['jurusan_id']) { ?>
                                                <tr>
                                                    <td><?= $j['nama']; ?></td>
                                                    <td><?= $j['semester']; ?></td>
                                                    <td><?= $j['nama_dosen']; ?></td>
                                                    <td><?= $j['tanggal_perkuliahan']; ?></td>
                                                    <td><?= $j['waktu_perkuliahan']; ?></td>
                                                    <td><?= $j['pertemuan-ke']; ?></td>
                                                    <td><?= $j['media_perkuliahan']; ?></td>
                                                    <td><?= $j['jenis_kegiatan_perkuliahan']; ?></td>
                                                    <td><?= $j['materi_perkuliahan']; ?></td>
                                                    <td><?= $j['jumlah_kehadiran']; ?></td>
                                                    <td><?= $j['nama_pengisi']; ?></td>
                                                    <td><?= $j['nim_pengisi']; ?></td>
                                                    <?php if (in_groups('keting') || in_groups('admin')) { ?>
                                                        <td>
                                                            <form action="/Jurnal/hapus">
                                                                <input type="hidden" name="id" value="<?= $j['id']; ?>">
                                                                <button class="btn btn-danger" onclick="return confirm('HAPUS JURNAL INI?');"><span class="fa fa-trash"></span></button>
                                                            </form>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
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