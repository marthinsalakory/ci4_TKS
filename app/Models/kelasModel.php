<?php

namespace App\Models;

use CodeIgniter\Model;

class kelasModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'kelas';
    // protected $allowedFields = ['email', 'username', 'nama_lengkap', 'no_telp', 'level', 'password_hash', 'active'];

    public function getkelas($id = false)
    {

        if ($id == false) {
            $query =  $this->select('f.id as fakultas_id, j.id as jurusan_id, k.id as kuliah_id, nama, semester, nama_fakultas, nama_jurusan')
                ->join('fakultas f', 'f.id = kelas.fakultas')
                ->join('jurusan j', 'j.id = kelas.jurusan')
                ->join('kuliah k', 'k.id = kelas.kuliah')
                ->get();

            return $query->getResultArray();
        }


        return $this->where(['id' => $id])->first();
    }
}
