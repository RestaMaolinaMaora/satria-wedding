<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Dashboard Admin',
            'nama'  => session()->get('nama_user')
        ];

        return view('admin/dashboard', $data);
    }
}