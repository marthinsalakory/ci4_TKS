<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Pengguna extends BaseController
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

    public function tambah()
    {
        $data =
            [
                'title' => 'Tambah Pengguna',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('pengguna/tambah', $data);
    }
}
