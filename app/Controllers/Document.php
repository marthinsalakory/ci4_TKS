<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Document extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function galeri()
    {
        $data =
            [
                'title' => 'Galeri',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('document/galeri', $data);
    }
}
