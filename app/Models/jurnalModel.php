<?php

namespace App\Models;

use CodeIgniter\Model;

class jurnalModel extends Model
{

    protected $useTimestamps = true;
    protected $table = 'jurnal';
    protected $allowedFields = ['id', 'nama_dosen', 'kuliah', 'tanggal_perkuliahan', 'waktu_perkuliahan', 'pertemuan-ke', 'media_perkuliahan', 'jenis_kegiatan_perkuliahan', 'materi_prkuliahan', 'jumlah_kehadiran', 'nama_pengisi', 'nim_pengisi', 'fakultas', 'jurusan', 'tahun_ajaran', 'user_pengisi'];

    public function getjurnal($id = false)
    {

        if ($id == false) {
            $query =  $this->select('
            jurnal.id as id,
            f.id as fakultas_id,
            j.id as jurusan_id,
            nama_dosen,
            nama,
            tanggal_perkuliahan,
            waktu_perkuliahan,
            pertemuan-ke,
            media_perkuliahan,
            jenis_kegiatan_perkuliahan,
            materi_perkuliahan,
            jumlah_kehadiran,
            nama_pengisi,
            nim_pengisi,
            nama_fakultas,
            nama_jurusan,
            semester,
            tahun_ajaran,
            user_pengisi
            ')->join('fakultas f', 'f.id = jurnal.fakultas')
                ->join('jurusan j', 'j.id = jurnal.jurusan')
                ->join('kuliah k', 'k.id = jurnal.kuliah')
                ->get();

            return $query->getResultArray();
        }

        return $this->select('
        jurnal.id as id,
        f.id as fakultas_id,
        j.id as jurusan_id,
        nama_dosen,
        nama,
        tanggal_perkuliahan,
        waktu_perkuliahan,
        pertemuan-ke,
        media_perkuliahan,
        jenis_kegiatan_perkuliahan,
        materi_perkuliahan,
        jumlah_kehadiran,
        nama_pengisi,
        nim_pengisi,
        nama_fakultas,
        nama_jurusan,
        semester,
        tahun_ajaran,
        user_pengisi
        ')->join('fakultas f', 'f.id = jurnal.fakultas')
            ->join('jurusan j', 'j.id = jurnal.jurusan')
            ->join('kuliah k', 'k.id = jurnal.kuliah')
            ->where(['kuliah' => $id])->findAll();
    }
}
