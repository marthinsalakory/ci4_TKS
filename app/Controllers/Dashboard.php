<?php

namespace App\Controllers;

use App\Models\kuliahModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->kuliahModel = new kuliahModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Manage Users',

            ];
        return view('dashboard/index', $data);
    }
}
