<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',

            'hadir' => 128,
            'telat' => 17,
            'izin' => 24,
            'sakit' => 6,
        ];

        return view('admin/dashboard/index', $data);
    }
}