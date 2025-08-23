<?php

namespace App\Controllers;

use App\Models\JadwalAcaraModel;
use App\Models\KlienModel;
use App\Models\PaketModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $klienModel;
    protected $paketModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalAcaraModel();
        $this->klienModel = new KlienModel();
        $this->paketModel = new PaketModel();
    }

    // Halaman daftar jadwal
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->jadwalModel->builder();
        $builder->select('jadwal_acara.*, klien.nama_klien, paket.nama_paket');
        $builder->join('klien', 'klien.id_klien = jadwal_acara.id_klien');
        $builder->join('paket', 'paket.id_paket = jadwal_acara.id_paket');

        if ($keyword) {
            $builder->like('klien.nama_klien', $keyword)
                    ->orLike('paket.nama_paket', $keyword)
                    ->orLike('jadwal_acara.lokasi_acara', $keyword);
        }

        $jadwal = $builder->get()->getResultArray();

        $data = [
            'title' => 'Kelola Jadwal',
            'jadwal' => $jadwal,
            'keyword' => $keyword
        ];

        return view('admin/jadwal/index', $data);
    }

    // Form tambah jadwal
    public function create()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'klien' => $this->klienModel->findAll(),
            'paket' => $this->paketModel->findAll(),
        ];

        return view('admin/jadwal/create', $data);
    }

    // Proses simpan jadwal baru
    public function store()
    {
        $tanggal = $this->request->getPost('tanggal_acara');

        $count = $this->jadwalModel->where('tanggal_acara', $tanggal)->countAllResults();

        if ($count >= 5) {
            return redirect()->back()->with('error', 'Tanggal ini sudah mencapai batas 5 jadwal.');
        }

        $this->jadwalModel->insert([
            'id_klien' => $this->request->getPost('id_klien'),
            'id_paket' => $this->request->getPost('id_paket'),
            'tanggal_acara' => $tanggal,
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
            'lokasi_acara' => $this->request->getPost('lokasi_acara'),
            'status_acara' => $this->request->getPost('status_acara'),
        ]);

        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Form edit jadwal
    public function edit($id)
    {
        $jadwal = $this->jadwalModel->find($id);

        if (!$jadwal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Jadwal dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => 'Edit Jadwal',
            'jadwal' => $jadwal,
            'klien' => $this->klienModel->findAll(),
            'paket' => $this->paketModel->findAll(),
        ];

        return view('admin/jadwal/edit', $data);
    }

    // Proses update jadwal
    public function update($id)
    {
        $tanggal = $this->request->getPost('tanggal_acara');

        $count = $this->jadwalModel
                      ->where('tanggal_acara', $tanggal)
                      ->where('id_jadwal !=', $id)
                      ->countAllResults();

        if ($count >= 5) {
            return redirect()->back()->with('error', 'Tanggal ini sudah mencapai batas 5 jadwal.');
        }

        $this->jadwalModel->update($id, [
            'id_klien' => $this->request->getPost('id_klien'),
            'id_paket' => $this->request->getPost('id_paket'),
            'tanggal_acara' => $tanggal,
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
            'lokasi_acara' => $this->request->getPost('lokasi_acara'),
            'status_acara' => $this->request->getPost('status_acara'),
        ]);

        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Hapus jadwal
    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil dihapus.');
    }
}