<?php

namespace App\Models;

use CodeIgniter\Model;

class kuliahModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'kuliah';
    protected $allowedFields = ['nama', 'semester', 'fakultas', 'jurusan'];

    public function getkuliah($id = false)
    {

        if ($id == false) {
            $query =  $this->select('kuliah.id as id, kuliah.fakultas as k_f, kuliah.jurusan as k_j, f.id as fakultas_id, j.id as jurusan_id, nama, semester, nama_fakultas, nama_jurusan')
                ->join('fakultas f', 'f.id = kuliah.fakultas')
                ->join('jurusan j', 'j.id = kuliah.jurusan')
                ->get();

            return $query->getResultArray();
        }


        return $this->where(['id' => $id])->first();
    }

    public function getper()
    {
        return $this->findAll();
    }
}
