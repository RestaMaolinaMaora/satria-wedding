<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'user';        // tabel user/admin
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'nama_user',
        'username',
        'password'
    ];
}