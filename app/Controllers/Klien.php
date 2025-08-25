<?php

namespace App\Controllers;

use App\Models\KlienModel;

class Klien extends BaseController
{
    protected $klienModel;

    public function __construct()
    {
        $this->klienModel = new KlienModel();
    }

    // Halaman index dengan pencarian tanpa pagination
    public function index()
    {
        $keyword = $this->request->getGet('keyword'); 
        $klien   = $this->klienModel->getKlien($keyword);

        $data = [
            'title'   => 'Data Klien',
            'klien'   => $klien,
            'keyword' => $keyword
        ];

        return view('admin/klien/index', $data);
    }

    // Form tambah klien
    public function create()
    {
        $data = ['title' => 'Tambah Klien'];
        return view('admin/klien/create', $data);
    }

    // Simpan data klien baru
    public function store()
    {
        $this->klienModel->save([
            'nama_klien' => $this->request->getPost('nama_klien'),
            'email'      => $this->request->getPost('email'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat'     => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('admin/klien');
    }

    // Form edit klien
    public function edit($id)
    {
        $klien = $this->klienModel->find($id);
        if (!$klien) {
            return redirect()->to('admin/klien')->with('error', 'Data klien tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Klien',
            'klien' => $klien
        ];

        return view('admin/klien/edit', $data);
    }

    // Update data klien
    public function update($id)
    {
        $this->klienModel->update($id, [
            'nama_klien' => $this->request->getPost('nama_klien'),
            'email'      => $this->request->getPost('email'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat'     => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('admin/klien');
    }

    // Hapus data klien
    public function delete($id)
    {
        $this->klienModel->delete($id);
        return redirect()->to('admin/klien');
    }
}