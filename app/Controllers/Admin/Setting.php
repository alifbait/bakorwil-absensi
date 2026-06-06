<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Setting extends BaseController
{
    public function umum()
    {
        return view('admin/setting/umum');
    }

    public function lokasi()
    {
        return view('admin/setting/lokasi');
    }

    public function absensi()
    {
        return view('admin/setting/absensi');
    }

    public function jamkerja()
    {
        return view('admin/setting/jamkerja');
    }

    public function harilibur()
    {
        return view('admin/setting/harilibur');
    }

    public function notifikasi()
    {
        return view('admin/setting/notifikasi');
    }
}