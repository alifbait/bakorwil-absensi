<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $protectFields = true;

    protected $allowedFields = [
        'user_id',
        'division_id',
        'nama_lengkap',
        'nim',
        'email',
        'no_hp',
        'asal_instansi',
        'foto_profile',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];

    protected bool $allowEmptyInserts = false;

    protected bool $updateOnlyChanged = false;

    protected array $casts = [];

    protected array $castHandlers = [];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}