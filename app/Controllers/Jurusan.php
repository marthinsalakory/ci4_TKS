<?php

namespace App\Controllers;

use App\Models\jurusanModel;
use App\Models\fakultasModel;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->jurusanModel = new jurusanModel();
        $this->fakultasModel = new fakultasModel();
    }
    public function index()
    {
        if (in_groups('admin') || in_groups('operator_fakultas')) {
            $data =
                [
                    'title' => 'Data Jurusan',
                    'jurusan' => $this->jurusanModel->getjurusan(),
                    'fakultas' => $this->fakultasModel->getfakultas(),
                ];
            return view('Jurusan/index', $data);
        } else {
            return redirect()->back();
        }
    }

    public function tambah()
    {
        // if (in_groups('admin')  || in_groups('operator')) {
        //     $kode = strtoupper($this->request->getVar('nama_jurusan'));
        //     $kod = strtoupper($this->request->getVar('fakultas'));
        //     $nama = filter_var($kode, FILTER_SANITIZE_STRING);
        //     $fak = filter_var($kod, FILTER_SANITIZE_STRING);
        //     $this->jurusanModel->save([
        //         'nama_jurusan' => $nama,
        //         'fakultas_id' => $fak,

        //     ]);
        //     session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN JURUSAN ' . $nama);
        //     return redirect()->to('/Jurusan');
        // } else
        if (in_groups('admin')  || in_groups('operator_fakultas')) {
            $kode = strtoupper($this->request->getVar('nama_jurusan'));
            $nama = filter_var($kode, FILTER_SANITIZE_STRING);
            $this->jurusanModel->save([
                'nama_jurusan' => $nama,
                'fakultas_id' => user()->fakultas,

            ]);
            session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN JURUSAN ' . $nama);
            return redirect()->to('/Jurusan');
        } else {
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if (in_groups('admin') || in_groups('operator_fakultas')) {
            $id = $this->request->getVar('id');
            $nama = $this->request->getVar('nama');
            $this->jurusanModel->delete($id);
            session()->setFlashdata('pesan', 'JURUSAN ' . $nama . ' BERHASIL DIHAPUS.');
            return redirect()->to('/Jurusan');
        } else {
            return redirect()->back();
        }
    }
}
