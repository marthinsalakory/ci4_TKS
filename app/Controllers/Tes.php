<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Fakultas extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Pengguna',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('pengguna/index', $data);
    }
}
