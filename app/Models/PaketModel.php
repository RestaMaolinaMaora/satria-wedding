<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table            = 'paket';
    protected $primaryKey       = 'id_paket';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'nama_paket',
        'deskripsi',
        'harga'
    ];
}