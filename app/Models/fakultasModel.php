<?php

namespace App\Models;

use CodeIgniter\Model;

class fakultasModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'fakultas';
    protected $allowedFields = ['nama_fakultas'];

    public function getfakultas($id = false)
    {

        if ($id == false) {

            return $this->findAll();
        }


        return $this->where(['id' => $id])->first();
    }
}
