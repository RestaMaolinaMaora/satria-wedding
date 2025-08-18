<?php

namespace App\Controllers;

class Paket extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Data Paket'];
        return view('admin/paket', $data);
    }
}