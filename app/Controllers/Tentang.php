<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Tentang extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function kami()
    {
        $data =
            [
                'title' => 'Hubungi Kami',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('tentang/hubungi', $data);
    }
}
