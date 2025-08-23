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

    public function index()
    {
        $keyword = $this->request->getGet('keyword'); // ambil keyword dari query string

        if ($keyword) {
            $klien = $this->klienModel->search($keyword);
        } else {
            $klien = $this->klienModel->findAll();
        }

        $data = [
            'title' => 'Data Klien',
            'klien' => $klien,
            'keyword' => $keyword // supaya bisa ditampilkan di form pencarian
        ];
        return view('admin/klien/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Klien'];
        return view('admin/klien/tambah', $data);
    }

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

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Klien',
            'klien' => $this->klienModel->find($id)
        ];
        return view('admin/klien/edit', $data);
    }

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

    public function delete($id)
    {
        $this->klienModel->delete($id);
        return redirect()->to('admin/klien');
    }
}