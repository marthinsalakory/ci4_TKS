<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Kelas extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Kelas',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('kelas/index', $data);
    }

    public function tambah()
    {
        $data =
            [
                'title' => 'Tambah Kelas',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('kelas/tambah', $data);
    }
}
