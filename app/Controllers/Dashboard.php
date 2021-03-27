<?php

namespace App\Controllers;

// use App\Models\rolesModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        // $this->pegawaiModel = new pegawaiModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Manage Users',
                // 'pegawai' => $this->pegawaiModel->getPegawai(),
            ];
        return view('dashboard/index', $data);
    }
}
