<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {

        /*
        |--------------------------------------------------------------------------
        | BELUM LOGIN
        |--------------------------------------------------------------------------
        */

        if (!session()->get('logged_in')) {

            return redirect()->to('/login');

        }

        /*
        |--------------------------------------------------------------------------
        | KHUSUS ADMIN
        |--------------------------------------------------------------------------
        */

        $uri = service('uri');

        $segment1 = $uri->getSegment(1);

        if (
            $segment1 === 'admin' &&
            session()->get('role') !== 'admin'
        ) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | KHUSUS USER
        |--------------------------------------------------------------------------
        */

        if (
            $segment1 === 'dashboard' &&
            session()->get('role') !== 'anggota'
        ) {

            return redirect()->to('/admin/dashboard');

        }

    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
    }
}