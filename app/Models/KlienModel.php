<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';
    protected $allowedFields = ['nama_klien', 'email', 'no_telepon', 'alamat'];

    // Method ambil semua klien sesuai keyword, selalu mengembalikan array
    public function getKlien($keyword = null)
    {
        $builder = $this->table($this->table);

        if ($keyword) {
            $builder->like('nama_klien', $keyword)
                    ->orLike('email', $keyword)
                    ->orLike('no_telepon', $keyword)
                    ->orLike('alamat', $keyword);
        }

        $result = $builder->get()->getResultArray();
        return $result ?? [];
    }
}