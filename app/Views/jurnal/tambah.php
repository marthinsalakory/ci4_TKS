<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jurnal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Jurnal">Jurnal</a></li>
                        <li class="breadcrumb-item active">Tambah Jurnal</li>
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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Jurnal</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="/Jurnal/save" enctype="multipart/form-data>
                            <div class=" card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Kuliah</label>
                                <select name="kuliah" id="" class="form-control">
                                    <option value="">Pilih : </option>
                                    <?php foreach ($kuliah as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dosen Pengajar</label>
                                <input type="text" name="nama_dosen" class="form-control" placeholder="Masukan Nama Pengajar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Perkuliahan</label>
                                <input type="date" name="tanggal_perkuliahan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Waktu Mulai Perkuliahan</label>
                                <input type="time" name="waktuawal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Waktu Akhir Perkuliahan</label>
                                <input type="time" name="waktuakhir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pertemuan ke</label>
                                <input type="number" name="pertemuan-ke" class="form-control" placeholder="Masukan Jumlah Pertemuan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Media Perkuliahan</label>
                                <input type="text" name="media_perkuliahan" class="form-control" placeholder="Masukan Media Perkuliahan yang Digunakan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kegiatan Perkuliahan</label>
                                <input type="text" name="jenis_kegiatan_perkuliahan" class="form-control" placeholder="Masukan Jenis Kegiatan Perkuliahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Materi Perkuliahan</label>
                                <input type="text" name="materi_perkuliahan" class="form-control" placeholder="Masukan Judul Materi Perkuliahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Kehadiran</label>
                                <input type="number" name="jumlah_kehadiran" class="form-control" placeholder="Masukan Jumlah Kehadiran Mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengisi</label>
                                <input type="text" name="nama_pengisi" class="form-control" placeholder="Masukan Nama Anda">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIM Pengisi</label>
                                <input type="text" name="nim_pengisi" class="form-control" placeholder="Masukan NIM Anda">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple">Bukti Perkuliahan</label>
                                <input class="form-control" class="form-control" name="file" type="file" id="formFileMultiple" multiple>
                            </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a type="button" href="/Jurnal" class="btn btn-danger">Kembali</a>
                    </div>
                    </form>
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