<?php

namespace App\Controllers;

use App\Models\fakultasModel;

class Fakultas extends BaseController
{
    public function __construct()
    {
        $this->fakultasModel = new fakultasModel();
    }
    public function index()
    {
        if (in_groups('admin') || in_groups('operator')) {
            $data =
                [
                    'title' => 'Data Fakultas',
                    'fakultas' => $this->fakultasModel->getfakultas(),
                ];
            return view('Fakultas/index', $data);
        } else {
            return redirect()->back();
        }
    }

    public function tambah()
    {
        if (in_groups('admin') || in_groups('operator')) {
            $kode = strtoupper($this->request->getVar('nama_fakultas'));
            $nama = filter_var($kode, FILTER_SANITIZE_STRING);
            $this->fakultasModel->save([
                'nama_fakultas' => $nama,

            ]);
            session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN FAKULTAS ' . $nama);
            return redirect()->to('/Fakultas');
        } else {
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if (in_groups('admin') || in_groups('operator')) {
            $id = $this->request->getVar('id');
            $nama = $this->request->getVar('nama');
            $this->fakultasModel->delete($id);
            session()->setFlashdata('pesan', 'FAKULTAS ' . $nama . ' BERHASIL DIHAPUS.');
            return redirect()->to('/Fakultas');
        } else {
            return redirect()->back();
        }
    }
}
