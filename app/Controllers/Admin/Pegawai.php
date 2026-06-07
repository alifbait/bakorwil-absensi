<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\PesertaModel;
use App\Models\DivisionModel;

class Pegawai extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | LIST DATA PEGAWAI
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pesertaModel = new \App\Models\PesertaModel();

        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        $builder = $pesertaModel
            ->select('
            peserta.*,
            divisions.nama_divisi
        ')
            ->join(
                'divisions',
                'divisions.id = peserta.division_id',
                'left'
            );

        // SEARCH
        if (!empty($search)) {

            $builder->groupStart()
                ->like('nama_lengkap', $search)
                ->orLike('nim', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        // FILTER STATUS
        if (!empty($status)) {

            $builder->where(
                'peserta.status',
                $status
            );
        }

        $data['pegawai'] = $builder->findAll();

        return view(
            'admin/pegawai/index',
            $data
        );
    }
    /*
    |--------------------------------------------------------------------------
    | DETAIL PEGAWAI
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $pesertaModel = new PesertaModel();

        $pegawai = $pesertaModel
            ->select('
                peserta.*,
                divisions.nama_divisi,
                users.username,
                users.role,
                users.is_active,
                users.last_login
            ')
            ->join(
                'divisions',
                'divisions.id = peserta.division_id',
                'left'
            )
            ->join(
                'users',
                'users.id = peserta.user_id',
                'left'
            )
            ->where('peserta.id', $id)
            ->first();

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [

            'title' => 'Detail Pegawai',

            'pegawai' => $pegawai

        ];

        return view(
            'admin/pegawai/detail',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $divisionModel = new DivisionModel();

        $data = [

            'title' => 'Tambah Pegawai',

            'divisions' => $divisionModel->findAll()

        ];

        return view(
            'admin/pegawai/create',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE DATA
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $userModel = new UserModel();

        $pesertaModel = new PesertaModel();

        /*
        |--------------------------------------------------------------------------
        | FOTO PROFILE
        |--------------------------------------------------------------------------
        */

        $foto = $this->request->getFile('foto');

        $namaFoto = 'default.png';

        if ($foto && $foto->isValid()) {

            $namaFoto = $foto->getRandomName();

            $foto->move(
                FCPATH . 'uploads/profile',
                $namaFoto
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DIVISI
        |--------------------------------------------------------------------------
        */

        $divisionModel = new DivisionModel();

        $division = $divisionModel->find(
            $this->request->getPost('division_id')
        );

        /*
        |--------------------------------------------------------------------------
        | INSERT USERS
        |--------------------------------------------------------------------------
        */

        $userModel->insert([

            'nama' => $this->request->getPost('nama_lengkap'),

            'username' => $this->request->getPost('username'),

            'password' => password_hash(
                '12345678',
                PASSWORD_DEFAULT
            ),

            'role' => strtolower(
                $this->request->getPost('role')
            ),

            'divisi' => $division['nama_divisi'],

            'foto' => $namaFoto,

            'is_active' => 1

        ]);

        $userId = $userModel->getInsertID();

        /*
        |--------------------------------------------------------------------------
        | INSERT PESERTA
        |--------------------------------------------------------------------------
        */

        $pesertaModel->insert([

            'user_id' => $userId,

            'division_id' => $this->request->getPost('division_id'),

            'nama_lengkap' => $this->request->getPost('nama_lengkap'),

            'nim' => $this->request->getPost('nim'),

            'email' => $this->request->getPost('email'),

            'no_hp' => $this->request->getPost('no_hp'),

            'asal_instansi' => $this->request->getPost('asal_instansi'),

            'foto_profile' => $namaFoto,

            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),

            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),

            'status' => strtolower(
                $this->request->getPost('status')
            )

        ]);

        session()->setFlashdata(

            'success',

            'Data pegawai berhasil ditambahkan.'

        );

        return redirect()->to('/admin/pegawai');
    }

    /*
|--------------------------------------------------------------------------
| FORM EDIT
|--------------------------------------------------------------------------
*/

    public function edit($id)
    {
        $pesertaModel = new PesertaModel();

        $divisionModel = new DivisionModel();

        $pegawai = $pesertaModel
            ->where('id', $id)
            ->first();

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [

            'title' => 'Edit Pegawai',

            'pegawai' => $pegawai,

            'divisions' => $divisionModel->findAll()

        ];

        return view(
            'admin/pegawai/edit',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE DATA
    |--------------------------------------------------------------------------
    */

    public function update($id)
    {
        $pesertaModel = new PesertaModel();

        $userModel = new UserModel();

        $pegawai = $pesertaModel->find($id);

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        /*
        |--------------------------------------------------------------------------
        | FOTO PROFILE
        |--------------------------------------------------------------------------
        */

        $foto = $this->request->getFile('foto_profile');

        $namaFoto = $pegawai['foto_profile'];

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {

            $namaFoto = $foto->getRandomName();

            /*
            |--------------------------------------------------------------------------
            | BUAT FOLDER JIKA BELUM ADA
            |--------------------------------------------------------------------------
            */

            if (!is_dir(FCPATH . 'uploads/profile')) {

                mkdir(
                    FCPATH . 'uploads/profile',
                    0777,
                    true
                );
            }

            /*
            |--------------------------------------------------------------------------
            | HAPUS FOTO LAMA
            |--------------------------------------------------------------------------
            */

            if (
                !empty($pegawai['foto_profile']) &&
                $pegawai['foto_profile'] != 'default.png' &&
                file_exists(
                    FCPATH . 'uploads/profile/' . $pegawai['foto_profile']
                )
            ) {

                unlink(
                    FCPATH . 'uploads/profile/' . $pegawai['foto_profile']
                );
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD FOTO BARU
            |--------------------------------------------------------------------------
            */

            $foto->move(
                FCPATH . 'uploads/profile',
                $namaFoto
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PESERTA
        |--------------------------------------------------------------------------
        */

        $pesertaModel->update($id, [

            'division_id' => $this->request->getPost('division_id'),

            'nama_lengkap' => $this->request->getPost('nama_lengkap'),

            'nim' => $this->request->getPost('nim'),

            'email' => $this->request->getPost('email'),

            'no_hp' => $this->request->getPost('no_hp'),

            'asal_instansi' => $this->request->getPost('asal_instansi'),

            'foto_profile' => $namaFoto,

            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),

            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),

            'status' => strtolower(
                $this->request->getPost('status')
            )

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE USERS
        |--------------------------------------------------------------------------
        */

        $divisionModel = new DivisionModel();

        $division = $divisionModel->find(
            $this->request->getPost('division_id')
        );

        $userModel->update($pegawai['user_id'], [

            'nama' => $this->request->getPost('nama_lengkap'),

            'divisi' => $division['nama_divisi'],

            'foto' => $namaFoto

        ]);

        /*
        |--------------------------------------------------------------------------
        | FLASH MESSAGE
        |--------------------------------------------------------------------------
        */

        session()->setFlashdata(

            'success',

            'Data pegawai berhasil diperbarui.'

        );

        return redirect()->to('/admin/pegawai/detail/' . $id);
    }
    /*
    |--------------------------------------------------------------------------
    | KELOLA AKUN
    |--------------------------------------------------------------------------
    */

    public function akun($id)
    {
        $pesertaModel = new PesertaModel();

        $pegawai = $pesertaModel
            ->select('
            peserta.*,
            users.id as user_id,
            users.nama,
            users.username,
            users.role,
            users.divisi,
            users.foto,
            users.is_active,
            users.last_login
        ')
            ->join(
                'users',
                'users.id = peserta.user_id',
                'left'
            )
            ->where('peserta.id', $id)
            ->first();

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        /*
        |--------------------------------------------------------------------------
        | FORMAT STATUS
        |--------------------------------------------------------------------------
        */

        $pegawai['status'] = $pegawai['is_active'] == 1
            ? 'Aktif'
            : 'Nonaktif';

        /*
        |--------------------------------------------------------------------------
        | FORMAT ROLE
        |--------------------------------------------------------------------------
        */

        $pegawai['role'] = ucfirst(
            strtolower($pegawai['role'])
        );

        $data = [

            'title' => 'Kelola Akun',

            'pegawai' => $pegawai,

            'id' => $id

        ];

        return view(
            'admin/pegawai/akun',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE AKUN
    |--------------------------------------------------------------------------
    */

    public function akunUpdate($id)
    {
        $pesertaModel = new PesertaModel();

        $userModel = new UserModel();

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA PEGAWAI
        |--------------------------------------------------------------------------
        */

        $pegawai = $pesertaModel
            ->where('id', $id)
            ->first();

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        /*
        |--------------------------------------------------------------------------
        | DATA UPDATE
        |--------------------------------------------------------------------------
        */

        $dataUpdate = [

            'username' => $this->request->getPost('username'),

            'role' => strtolower(
                $this->request->getPost('role')
            ),

            'is_active' => $this->request->getPost('status') == 'Aktif'
                ? 1
                : 0

        ];

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD JIKA DIISI
        |--------------------------------------------------------------------------
        */

        $password = $this->request->getPost('password');

        if (!empty($password)) {

            $dataUpdate['password'] = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE USERS
        |--------------------------------------------------------------------------
        */

        $userModel->update(
            $pegawai['user_id'],
            $dataUpdate
        );

        /*
        |--------------------------------------------------------------------------
        | SINKRON STATUS PESERTA
        |--------------------------------------------------------------------------
        */

        $pesertaModel->update($id, [

            'status' => $this->request->getPost('status') == 'Aktif'
                ? 'aktif'
                : 'nonaktif'

        ]);

        session()->setFlashdata(

            'success',
            'Akun pegawai berhasil diperbarui.'

        );

        return redirect()->to(
            '/admin/pegawai/akun/' . $id
        );
    }
}