<?php

namespace App\Controllers;

use App\Models\messageModel;
use App\Models\usersModel;
use CodeIgniter\I18n\Time;


class Message extends BaseController
{
    public function __construct()
    {
        $this->messageModel = new messageModel();
        $this->usersModel = new usersModel();
    }

    public function index()
    {
        $conn = \Config\Database::connect();
        $id = user()->id;
        $kode = $conn->query("SELECT * FROM `message` ORDER BY id ASC");

        $tes = $kode->getResultArray();
        // foreach ($set as $s) {
        //     $user_id = $s['id'];
        // }
        $data =
            [
                'message' => $this->messageModel->getmessage(),
                'users' => $this->usersModel->getuser(),
                'tes' => $tes,
                'title' => 'Message'
            ];
        return view('message/index', $data);
    }

    public function search()
    {
        $conn = \Config\Database::connect();
        $inpText = $_POST['query'];
        $kode = $conn->query("SELECT * FROM users WHERE nama_lengkap LIKE '%$inpText%'");
        $tes = $kode->getResultArray();

        $data =
            [
                'users' => $this->usersModel->getuser(),
                'tes' => $tes,
            ];
        return view('message/search', $data);
    }

    public function tampil()
    {
        $conn = \Config\Database::connect();
        $id = user()->id;
        $kode = $conn->query("SELECT * FROM `message` ORDER BY id ASC");

        $tes = $kode->getResultArray();
        // foreach ($set as $s) {
        //     $user_id = $s['id'];
        // }
        $data =
            [
                'message' => $this->messageModel->getmessage(),
                'tes' => $tes,
                'title' => 'Message'
            ];
        return view('message/tampil', $data);
    }

    public function kirim()
    {
        $date = Time::now('Asia/Tokyo', 'en_US');

        $pesan = escapeshellcmd($this->request->getVar('pesan'));
        if (in_groups('admin')) {
            $id = $this->request->getVar('id');
            $nama = $this->request->getVar('nama');
        } else {
            $id = 16;
            $nama = 'Martin Alfreinsco Salakory';
        }
        $idsaya = user()->id;

        $this->messageModel->save([
            'pesan' => $pesan,
            'pengirim' => $idsaya,
            'nama_penerima' => $nama,
            'penerima' => $id,
            'date' => $date,
        ]);
        // session()->setFlashdata('pesan', 'file document berhasil tambahkan.');
        return redirect()->to('/message');
    }

    public function deleteall()
    {
        $idsaya = user()->id;
        // set role
        $conn = \Config\Database::connect();

        $conn->query("DELETE FROM `message` WHERE pengirim = $idsaya");
        $conn->query("DELETE FROM `message` WHERE penerima = $idsaya");
        // session()->setFlashdata('pesan', 'file document berhasil tambahkan.');
        return redirect()->to('/message');
    }





    //--------------------------------------------------------------------

}
