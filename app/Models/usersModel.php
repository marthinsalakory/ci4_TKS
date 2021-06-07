<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $useTimestamps = true;
    protected $table = 'users';
    protected $allowedFields = ['fakultas', 'jurusan', 'email', 'username', 'nama_lengkap', 'no_telp', 'level', 'password_hash', 'active'];

    public function getusers($id = false)
    {

        if ($id == false) {
            $query =  $this->select('users.id as usersid, ag.id as id_group, nama_lengkap, no_telp, email, description, username, level, nama_fakultas, nama_jurusan')
                ->join('auth_groups ag', 'ag.id = users.level')
                ->join('fakultas f', 'f.id = users.fakultas')
                ->join('jurusan j', 'j.id = users.jurusan')
                ->get();

            return $query->getResultArray();
        }


        return $this->where(['id' => $id])->first();
    }
}
