<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth/login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PROCESS
    |--------------------------------------------------------------------------
    */

    public function attemptLogin()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | USER TIDAK ADA
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return redirect()->back()->with(
                'error',
                'Username tidak ditemukan'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PASSWORD SALAH
        |--------------------------------------------------------------------------
        */

        if (!password_verify($password, $user['password'])) {

            return redirect()->back()->with(
                'error',
                'Password salah'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | USER NONAKTIF
        |--------------------------------------------------------------------------
        */

        if ($user['is_active'] == 0) {

            return redirect()->back()->with(
                'error',
                'Akun dinonaktifkan'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SAVE SESSION
        |--------------------------------------------------------------------------
        */

        $sessionData = [

            'user_id' => $user['id'],

            'username' => $user['username'],

            'nama' => $user['nama'] ?? $user['username'],

            'foto' => $user['foto'] ?? 'default.png',

            'role' => $user['role'],

            'logged_in' => true

        ];

        $session->set($sessionData);

        /*
        |--------------------------------------------------------------------------
        | UPDATE LAST LOGIN
        |--------------------------------------------------------------------------
        */

        $userModel->update($user['id'], [
            'last_login' => date('Y-m-d H:i:s')
        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT ROLE
        |--------------------------------------------------------------------------
        */

        if ($user['role'] == 'admin') {

            return redirect()->to('/admin/dashboard');

        } else {

            return redirect()->to('/dashboard');

        }
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}