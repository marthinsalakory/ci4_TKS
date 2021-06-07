<?php

namespace App\Controllers;

use App\Models\jurnalModel;
use App\Models\kuliahModel;
use CodeIgniter\I18n\Time;

class Jurnal extends BaseController
{
    public function __construct()
    {
        $this->jurnalModel = new jurnalModel();
        $this->kuliahModel = new kuliahModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Jurnal',
                'jurnal' => $this->jurnalModel->getjurnal(),
            ];
        return view('jurnal/index', $data);
    }

    public function tambah()
    {
        if (in_groups('keting') || in_groups('admin')) {
            $data =
                [
                    'title' => 'Jurnal',
                    'jurnal' => $this->jurnalModel->getjurnal(),
                    'kuliah' => $this->kuliahModel->getkuliah(),
                ];
            return view('jurnal/tambah', $data);
        } else {
            return redirect()->back();
        }
    }

    public function save()
    {
        dd($_POST);
        if (in_groups('keting') || in_groups('admin')) {
            // kode
            $conn = \Config\Database::connect();

            $query = $conn->query("SELECT * FROM jurnal ORDER BY id DESC LIMIT 1");
            $set = $query->getResultArray();
            if (!$set) {
                $id = 0;
            }
            foreach ($set as $s) {
                $id = $s['id'];
            }

            $this->jurnalModel->simpan([
                'id' => $id + 1,
                'kuliah' => filter_var(strtoupper($this->request->getVar('kuliah'))),
                'nama_dosen' => filter_var(strtoupper($this->request->getVar('nama_dosen'))),
                'tanggal_perkuliahan' => filter_var(strtoupper($this->request->getVar('tanggal_perkuliahan'))),
                'waktu_perkuliahan' => filter_var(strtoupper($this->request->getVar('waktuawal') . " -> " . $this->request->getVar('waktuakhir'))),
                'pertemuan-ke' => filter_var(strtoupper($this->request->getVar('pertemuan-ke'))),
                'media_perkuliahan' => filter_var(strtoupper($this->request->getVar('media_perkuliahan'))),
                'jenis_kegiatan_perkuliahan' => filter_var(strtoupper($this->request->getVar('jenis_kegiatan_perkuliahan'))),
                'materi_perkuliahan' => filter_var(strtoupper($this->request->getVar('materi_perkuliahan'))),
                'jumlah_kehadiran' => filter_var(strtoupper($this->request->getVar('jumlah_kehadiran'))),
                'nama_pengisi' => filter_var(strtoupper($this->request->getVar('nama_pengisi'))),
                'nim_pengisi' => filter_var(strtoupper($this->request->getVar('nim_pengisi'))),
                'fakultas' => user()->fakultas,
                'jurusan' => user()->jurusan,
                'tahun_ajaran' => Time::now('Asia/Tokyo', 'en_US')->getYear(),
                'user_pengisi' => user()->id,

            ]);
            session()->setFlashdata('pesan', 'SUSKES MENGISI JURNAL');
            return redirect()->to('/Jurnal');
        }
    }

    public function hapus()
    {
        if (in_groups('keting') || in_groups('admin')) {
            $id = $this->request->getVar('id');
            // dd($id);
            $this->jurnalModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus.');
            return redirect()->to('/Jurnal');
        }
    }

    public function kuliah($id)
    {
        $data = [
            'title' => 'Jurnal',
            'jurnal' => $this->jurnalModel->getjurnal($id),
        ];

        return view('jurnal/kuliah', $data);
    }
}
