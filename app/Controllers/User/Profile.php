<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\PesertaModel;

class Profile extends BaseController
{
    protected $userModel;

    protected $pesertaModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->pesertaModel = new PesertaModel();
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | USER LOGIN
        |--------------------------------------------------------------------------
        */

        $userId = session()->get('user_id');

        /*
        |--------------------------------------------------------------------------
        | JOIN USER + PESERTA
        |--------------------------------------------------------------------------
        */

        $user = $this->pesertaModel

            ->select('
                peserta.*,
                users.username,
                users.role,
                users.divisi,
                users.foto
            ')

            ->join(
                'users',
                'users.id = peserta.user_id'
            )

            ->where(
                'peserta.user_id',
                $userId
            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return redirect()->to('/dashboard')
                ->with(
                    'error',
                    'Data profile tidak ditemukan'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('user/profile/index', [

            'title' => 'Profile Saya',

            'user' => $user

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | FORM PASSWORD
    |--------------------------------------------------------------------------
    */

    public function password()
    {
        return view('user/profile/password', [

            'title' => 'Ubah Password'

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD
    |--------------------------------------------------------------------------
    */

    public function updatePassword()
    {
        $userModel = new UserModel();

        $userId = session()->get('user_id');

        /*
        |--------------------------------------------------------------------------
        | INPUT
        |--------------------------------------------------------------------------
        */

        $passwordLama = $this->request
            ->getPost('password_lama');

        $passwordBaru = $this->request
            ->getPost('password_baru');

        $konfirmasi = $this->request
            ->getPost('konfirmasi_password');

        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        $user = $userModel
            ->where('id', $userId)
            ->first();

        if (!$user) {

            return redirect()->back()
                ->with('error', 'User tidak ditemukan');

        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI PASSWORD LAMA
        |--------------------------------------------------------------------------
        */

        if (
            !password_verify(
                $passwordLama,
                $user['password']
            )
        ) {

            return redirect()->back()
                ->with(
                    'error',
                    'Password lama tidak sesuai'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        if (strlen($passwordBaru) < 6) {

            return redirect()->back()
                ->with(
                    'error',
                    'Password minimal 6 karakter'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI KONFIRMASI
        |--------------------------------------------------------------------------
        */

        if ($passwordBaru !== $konfirmasi) {

            return redirect()->back()
                ->with(
                    'error',
                    'Konfirmasi password tidak cocok'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        $userModel->update($userId, [

            'password' => password_hash(
                $passwordBaru,
                PASSWORD_DEFAULT
            )

        ]);

        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()->to('/profile/password')
            ->with(
                'success',
                'Password berhasil diperbarui'
            );
    }

}