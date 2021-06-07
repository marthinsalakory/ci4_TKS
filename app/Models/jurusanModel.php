<?php

namespace App\Models;

use CodeIgniter\Model;

class jurusanModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'jurusan';
    protected $allowedFields = ['nama_jurusan', 'fakultas_id'];

    public function getjurusan($id = false)
    {

        if ($id == false) {

            $query =  $this->select('jurusan.id as id, f.id as fak_id, nama_jurusan, nama_fakultas, fakultas_id')
                ->join('fakultas f', 'f.id = jurusan.fakultas_id')
                ->get();
            return $query->getResultArray();
            // return $this->findAll();
        }


        return $this->where(['id' => $id])->first();
    }
}
