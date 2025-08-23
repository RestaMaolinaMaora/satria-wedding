<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Default route /admin → redirect ke /admin/user
     */
    public function index()
    {
        return redirect()->to('/admin/user');
    }

    /**
     * Tampilkan daftar user/admin + fitur pencarian
     * View: app/Views/admin/user/index.php
     */
    public function user()
    {
        // Ambil keyword dari input GET
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $this->adminModel->like('nama_user', $keyword)
                             ->orLike('username', $keyword);
        }

        $data = [
            'title' => 'Kelola User',
            'admin' => $this->adminModel->findAll(),
            'keyword' => $keyword // biar input search tetap terisi
        ];

        return view('admin/user/index', $data);
    }

    /**
     * Form tambah admin baru
     * View: app/Views/admin/user/create.php
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah User'
        ];

        return view('admin/user/create', $data);
    }

    /**
     * Simpan admin baru ke database
     */
    public function store()
    {
        $this->adminModel->insert([
            'nama_user' => $this->request->getPost('nama_user'),
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/admin/user');
    }

    /**
     * Form edit admin
     * View: app/Views/admin/user/edit.php
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'admin' => $this->adminModel->find($id)
        ];

        return view('admin/user/edit', $data);
    }

    /**
     * Update data admin
     */
    public function update($id)
    {
        $updateData = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username'  => $this->request->getPost('username'),
        ];

        // Jika password diisi, hash ulang
        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->adminModel->update($id, $updateData);

        return redirect()->to('/admin/user');
    }

    /**
     * Hapus admin
     */
    public function delete($id)
    {
        $this->adminModel->delete($id);

        return redirect()->to('/admin/user');
    }
}