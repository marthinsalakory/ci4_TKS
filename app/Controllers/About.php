<?php

namespace App\Controllers;

use App\Models\rolesModel;
use App\Models\pegawaiModel;
use App\Models\levelModel;
use phpDocumentor\Reflection\Location;

class About extends BaseController
{
    public function __construct()
    {
        $this->pegawaiModel = new pegawaiModel();
        $this->levelModel = new levelModel();
        $this->rolesModel = new rolesModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'About M4S',
                'pegawai' => $this->pegawaiModel->getPegawai(),
                'level' => $this->levelModel->getlevel(),
            ];
        return view('about/index', $data);
    }




    //--------------------------------------------------------------------

}
