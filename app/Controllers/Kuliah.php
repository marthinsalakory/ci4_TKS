<?php

namespace App\Controllers;

use App\Models\kuliahModel;
use App\Models\fakultasModel;
use App\Models\jurusanModel;

class Kuliah extends BaseController
{
    public function __construct()
    {
        $this->kuliahModel = new kuliahModel();
        $this->fakultasModel = new fakultasModel();
        $this->jurusanModel = new jurusanModel();
    }
    public function index()
    {
        if (in_groups('admin') || in_groups('operator_fakultas')) {
            $data =
                [
                    'title' => 'Data Jurusan',
                    'kuliah' => $this->kuliahModel->getkuliah(),
                    'fakultas' => $this->fakultasModel->getfakultas(),
                    'jurusan' => $this->jurusanModel->getjurusan(),
                ];
            return view('Kuliah/index', $data);
        } else {
            return redirect()->back();
        }
    }

    public function tambah()
    {
        if (in_groups('operator_fakultas')) {
            $kode = strtoupper($this->request->getVar('nama'));
            $kod = strtoupper($this->request->getVar('semester'));
            $nama = filter_var($kode, FILTER_SANITIZE_STRING);
            $semester = filter_var($kod, FILTER_SANITIZE_STRING);

            $this->kuliahModel->save([
                'nama' => $nama,
                'semester' => $semester,
                'fakultas' => user()->fakultas,
                'jurusan' => user()->jurusan,
            ]);
            session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN MATAKULIAH ' . $nama);
            return redirect()->to('/Kuliah');
        } else if (in_groups('admin')) {
            $kode = strtoupper($this->request->getVar('nama'));
            $kod = strtoupper($this->request->getVar('semester'));
            $nama = filter_var($kode, FILTER_SANITIZE_STRING);
            $semester = filter_var($kod, FILTER_SANITIZE_STRING);

            $this->kuliahModel->save([
                'nama' => $nama,
                'semester' => $semester,
                'fakultas' => user()->fakultas,
                'jurusan' => user()->jurusan,
            ]);
            session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN MATAKULIAH ' . $nama);
            return redirect()->to('/Kuliah');
        } else {
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if (in_groups('admin') || in_groups('operator') || in_groups('operator_fakultas')) {
            $id = $this->request->getVar('id');
            $nama = $this->request->getVar('nama');
            $this->kuliahModel->delete($id);
            session()->setFlashdata('pesan', 'JURUSAN ' . $nama . ' BERHASIL DIHAPUS.');
            return redirect()->to('/Kuliah');
        } else {
            return redirect()->back();
        }
    }
}
