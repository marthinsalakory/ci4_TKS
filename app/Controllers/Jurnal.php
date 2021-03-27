<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Jurnal extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Jurnal',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('jurnal/index', $data);
    }
}
