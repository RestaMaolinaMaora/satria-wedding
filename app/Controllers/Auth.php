<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $session = session();
        $model   = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user di tabel admin
        $user = $model->where('username', $username)
                      ->where('password', $password) // sementara plaintext
                      ->first();

        if ($user) {
            // Simpan data ke session
            $session->set([
                'id_user'   => $user['id_user'],
                'nama_user' => $user['nama_user'],
                'logged_in' => true
            ]);
            return redirect()->to('/admin'); // ke dashboard
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}