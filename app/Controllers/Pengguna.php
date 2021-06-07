<?php

namespace App\Controllers;

use App\Models\usersModel;
use App\Models\fakultasModel;
use App\Models\jurusanModel;
use App\Models\groups_usersModel;
use App\Models\rolesModel;
use App\Models\levelModel;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->usersModel = new usersModel();
        $this->fakultasModel = new fakultasModel();
        $this->jurusanModel = new jurusanModel();
        $this->groups_UsersModel = new groups_UsersModel();
        $this->rolesModel = new rolesModel();
        $this->levelModel = new levelModel();
    }
    public function index()
    {
        if (in_groups('operator') || in_groups('operator_fakultas') || in_groups('admin')) {
            $data =
                [
                    'title' => 'Pengguna',
                    'validation' => \Config\Services::validation(),
                    'users' => $this->usersModel->getusers(),
                    'fakultas' => $this->fakultasModel->getfakultas(),
                ];
            return view('pengguna/index', $data);
        } else {
            return redirect()->back();
        }
    }

    public function tambah()
    {
        if (in_groups('operator') || in_groups('operator_fakultas') || in_groups('admin')) {
            $data =
                [
                    'title' => 'Tambah Pengguna',
                    'validation' => \Config\Services::validation(),
                    'fakultas' => $this->fakultasModel->getfakultas(),
                    'jurusan' => $this->jurusanModel->getjurusan(),
                    'roles' => $this->rolesModel->getroles(),
                ];
            return view('pengguna/tambah', $data);
        } else {
            return redirect()->back();
        }
    }

    public function save()
    {
        if (in_groups('operator') || in_groups('operator_fakultas') || in_groups('admin')) {
            // Validasi input
            if (in_groups('admin') || in_groups('operator')) {
                if (!$this->validate([
                    'username' => [
                        'rules' => 'required|is_unique[users.username]',
                        'errors' => [
                            'required' => 'USERNAME HARUS DIISI.',
                            'is_unique' => 'USERNAME SUDAH DIGUNAKAN.'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|is_unique[users.email]',
                        'errors' => [
                            'required' => 'EMAIL HARUS DIISI.',
                            'is_unique' => 'EMAIL SUDAH DIGUNAKAN.'
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required|is_unique[users.nama_lengkap]',
                        'errors' => [
                            'required' => 'NAMA LENGKAP HARUS DIISI.',
                            'is_unique' => 'NAMA LENGKAP SUDAH DIGUNAKAN.'
                        ]
                    ],
                    'fakultas' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'NAMA FAKULTAS HARUS DIISI.',
                        ]
                    ],
                    'jurusan' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'JURUSAN HARUS DIISI.',
                        ]
                    ],
                    'no_telp' => [
                        'rules' => 'required|is_unique[users.no_telp]',
                        'errors' => [
                            'required' => 'NOMOR TELEPHONE HARUS DIISI.',
                            'is_unique' => 'NOMOR TELEPHONE SUDAH DIGUNAKAN.'
                        ]
                    ],
                ])) {
                    return redirect()->back()->withInput();
                }
            }

            // untuk level
            if (in_groups('operator')) {
                $level = 3;
            } elseif (in_groups('operator_fakultas')) {
                $level = filter_var($this->request->getVar('level'));
                if ($level == 2) {
                    return redirect()->back()->withInput();
                }
                if ($level == 1) {
                    return redirect()->back()->withInput();
                }
                if ($level == 3) {
                    return redirect()->back()->withInput();
                }
            } else {
                $level = filter_var($this->request->getVar('level'));
            }

            $options = [
                'cost' => 10,
            ];
            $password = filter_var($this->request->getVar('username'));
            $pass_hash = password_hash(base64_encode(
                hash('sha384', $password, true)
            ), PASSWORD_DEFAULT, $options);
            if (in_groups('admin')) {
                $this->usersModel->save([
                    'nama_lengkap' => filter_var(strtoupper($this->request->getVar('nama_lengkap'))),
                    'fakultas' => filter_var($this->request->getVar('fakultas')),
                    'jurusan' => filter_var($this->request->getVar('jurusan')),
                    'no_telp' => filter_var($this->request->getVar('no_telp')),
                    'email' => filter_var(strtolower($this->request->getVar('email'))),
                    'username' => filter_var($this->request->getVar('username')),
                    'level' => $level,
                    'password_hash' => $pass_hash,
                    'active' => 1,

                ]);
            } elseif (in_groups('operator')) {
                $this->usersModel->save([
                    'nama_lengkap' => filter_var(strtoupper($this->request->getVar('nama_lengkap'))),
                    'fakultas' => filter_var($this->request->getVar('fakultas')),
                    'jurusan' => filter_var($this->request->getVar('jurusan')),
                    'no_telp' => filter_var($this->request->getVar('no_telp')),
                    'email' => filter_var(strtolower($this->request->getVar('email'))),
                    'username' => filter_var($this->request->getVar('username')),
                    'level' => 3,
                    'password_hash' => $pass_hash,
                    'active' => 1,

                ]);
            } else {
                $this->usersModel->save([
                    'nama_lengkap' => filter_var(strtoupper($this->request->getVar('nama_lengkap'))),
                    'fakultas' => user()->fakultas,
                    'jurusan' => user()->jurusan,
                    'no_telp' => filter_var($this->request->getVar('no_telp')),
                    'email' => filter_var(strtolower($this->request->getVar('email'))),
                    'username' => filter_var($this->request->getVar('username')),
                    'level' => $level,
                    'password_hash' => $pass_hash,
                    'active' => 1,

                ]);
            }

            // set role
            $conn = \Config\Database::connect();

            $kode = $conn->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
            $set = $kode->getResultArray();
            foreach ($set as $s) {
                $user_id = $s['id'];
            }
            //save
            $this->levelModel->save([
                'group_id' => $level,
                'user_id' => $user_id,
            ]);
            session()->setFlashdata('pesan', 'SUSKES TAMBAHKAN PENGGUNA BARU ');
            return redirect()->to('/Pengguna');
        } else {
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if (in_groups('operator') || in_groups('operator_fakultas') || in_groups('admin')) {
            $id = $this->request->getVar('id');
            $nama = $this->request->getVar('nama');
            $this->usersModel->delete($id);
            session()->setFlashdata('pesan', $nama . ' SUDAH DIHAPUS.');
            return redirect()->to('/Pengguna');
        } else {
            return redirect()->back();
        }
    }
}
