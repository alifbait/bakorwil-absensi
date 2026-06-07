<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinModel extends Model
{
    protected $table = 'izin';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'peserta_id',

        'jenis',

        'tanggal_mulai',
        'tanggal_selesai',

        'alasan',

        'file_pendukung',

        'status',

        'approved_by'

    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}