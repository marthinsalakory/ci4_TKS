<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    // protected $primaryKey = 'user_id';
    protected $allowedFields = ['email', 'username', 'nama_lengkap', 'level', 'no_telp', 'user_image', 'document', 'password_hash', 'active'];

    public function getuser($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $id])->first();
    }
}
