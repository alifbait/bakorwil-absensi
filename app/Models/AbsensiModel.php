<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'peserta_id',
        'tanggal',

        'jam_masuk',
        'jam_pulang',

        'latitude_masuk',
        'longitude_masuk',

        'latitude_pulang',
        'longitude_pulang',

        'selfie_masuk',
        'selfie_pulang',

        'survey_filled',

        'status',

        'total_jam_kerja'

    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}