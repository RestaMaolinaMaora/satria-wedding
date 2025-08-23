<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    // Halaman daftar paket (dengan pencarian + pagination)
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->paketModel;

        if ($keyword) {
            $builder = $builder
                ->like('nama_paket', $keyword)
                ->orLike('deskripsi', $keyword);
        }

        // gunakan pagination
        $paket = $builder->paginate(5, 'paket'); // 5 data per halaman

        $data = [
            'title'   => 'Kelola Paket',
            'paket'   => $paket,
            'pager'   => $this->paketModel->pager,
            'keyword' => $keyword
        ];

        return view('admin/paket/index', $data);
    }

    // Form tambah paket
    public function create()
    {
        $data = [
            'title' => 'Tambah Paket'
        ];
        return view('admin/paket/create', $data);
    }

    // Proses simpan paket
    public function store()
    {
        $this->paketModel->save([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil ditambahkan.');
    }

    // Form edit paket
    public function edit($id)
    {
        $paket = $this->paketModel->find($id);

        if (!$paket) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Paket dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => 'Edit Paket',
            'paket' => $paket
        ];
        return view('admin/paket/edit', $data);
    }

    // Proses update paket
    public function update($id)
    {
        $this->paketModel->update($id, [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil diperbarui.');
    }

    // Hapus paket
    public function delete($id)
    {
        $this->paketModel->delete($id);
        return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil dihapus.');
    }
}