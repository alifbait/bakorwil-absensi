<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useTimestamps = false;

    protected $allowedFields = [

        'jam_masuk',
        'jam_pulang',
        'toleransi_terlambat',
        'minimal_jam_kerja',
        'radius_absensi',
        'latitude_kantor',
        'longitude_kantor',
        'mode_validasi_gps',
        'auto_alpha',

        'hari_senin',
        'hari_selasa',
        'hari_rabu',
        'hari_kamis',
        'hari_jumat',
        'hari_sabtu',
        'hari_minggu',

        'notif_terlambat',
        'notif_izin',
        'reminder_absensi',

        'survey_link'
    ];
}