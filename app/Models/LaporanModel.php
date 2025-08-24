<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'jadwal_acara'; 
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = [
        'id_klien', 'id_paket', 'tanggal_acara', 'waktu_mulai', 'waktu_selesai', 'lokasi_acara', 'status_acara'
    ];

    // Ambil laporan dengan filter + JOIN ke tabel klien & paket
    public function getLaporan($startDate = null, $endDate = null, $status = null)
    {
        $builder = $this->db->table($this->table)
            ->select('jadwal_acara.*, klien.nama_klien, paket.nama_paket')
            ->join('klien', 'klien.id_klien = jadwal_acara.id_klien')
            ->join('paket', 'paket.id_paket = jadwal_acara.id_paket');

        if ($startDate && $endDate) {
            $builder->where('tanggal_acara >=', $startDate);
            $builder->where('tanggal_acara <=', $endDate);
        }

        if ($status && $status != 'Semua Status') {
            $builder->where('status_acara', $status);
        }

        return $builder->get()->getResultArray();
    }

    // Ambil semua data laporan untuk Export (Excel & PDF)
    public function getLaporanExport()
    {
        return $this->db->table($this->table)
            ->select('
                jadwal_acara.id_jadwal,
                klien.nama_klien,
                paket.nama_paket,
                jadwal_acara.tanggal_acara,
                jadwal_acara.waktu_mulai,
                jadwal_acara.waktu_selesai,
                jadwal_acara.status_acara
            ')
            ->join('klien', 'klien.id_klien = jadwal_acara.id_klien')
            ->join('paket', 'paket.id_paket = jadwal_acara.id_paket')
            ->get()
            ->getResultArray();
    }

    // Hitung total acara
    public function getTotalAcara()
    {
        return $this->countAll();
    }

    // Hitung total klien unik dari tabel klien
    public function getTotalKlien()
    {
        return $this->db->table('klien')->countAllResults();
    }

    // Hitung persentase acara selesai
    public function getPersentaseSelesai()
    {
        $total = $this->countAll();
        if ($total == 0) return 0;

        $selesai = $this->where('status_acara', 'Selesai')->countAllResults();
        return round(($selesai / $total) * 100, 2);
    }
}