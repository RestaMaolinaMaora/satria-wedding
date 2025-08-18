<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table            = 'klien';
    protected $primaryKey       = 'id_klien';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'nama_klien',
        'email',
        'no_telepon',
        'alamat'
    ];
}