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
                        <a href="/Kelas/tambah">
                            <button class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Jurnal</button>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Jurnal</li>
                        <li class="breadcrumb-item"><a href="/Jurnal/tambah">Tambah Data Jurnal</a></li>
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
                                        <th>Fakultas</th>
                                        <th>Program Study</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Nama Dosen</th>
                                        <th>Tanggal Kuliah</th>
                                        <th>Waktu Kuliah</th>
                                        <th>Pertemuan Ke-</th>
                                        <th>Media Pembelajaran</th>
                                        <th>Kegiatan Pembelajaran</th>
                                        <th>Materi Perkuliahan</th>
                                        <th>Jumlah Kehadiran</th>
                                        <th>Nama Pengisi Jurnal</th>
                                        <th>NIM Pengisi Jurnal</th>
                                        <th><span class="fa fa-cog"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                        <td>Win 95+</td>
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0 </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-primary">
                                        <th>Fakultas</th>
                                        <th>Program Study</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Nama Dosen</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Pertemuan Ke-</th>
                                        <th>Media Pembelajaran</th>
                                        <th>Kegiatan Pembelajaran</th>
                                        <th>Materi Perkuliahan</th>
                                        <th>Jumlah Kehadiran</th>
                                        <th>Nama Pengisi</th>
                                        <th>NIM Pengisi</th>
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