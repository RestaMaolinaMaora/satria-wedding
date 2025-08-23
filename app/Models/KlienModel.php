<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table = 'klien'; // sesuaikan nama tabel di database
    protected $primaryKey = 'id_klien';
    protected $allowedFields = ['nama_klien', 'email', 'no_telepon', 'alamat'];

    // Tambahkan method pencarian
    public function search($keyword)
    {
        return $this->table($this->table)
                    ->like('nama_klien', $keyword)
                    ->orLike('email', $keyword)
                    ->orLike('no_telepon', $keyword)
                    ->orLike('alamat', $keyword)
                    ->get()
                    ->getResultArray();
    }
}