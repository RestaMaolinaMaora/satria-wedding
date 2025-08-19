<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table = 'klien'; // sesuaikan nama tabel di database
    protected $primaryKey = 'id_klien';
    protected $allowedFields = ['nama_klien', 'email', 'no_telepon', 'alamat'];
}