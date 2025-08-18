<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalAcaraModel extends Model
{
    protected $table            = 'jadwal_acara';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'id_klien',      // foreign key klien
        'id_paket',      // foreign key paket
        'tanggal_acara',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi_acara',
        'status_acara' // status acara (misalnya: terjadwal, selesai, dibatalkan)
    ];
}