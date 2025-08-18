<?php

namespace App\Controllers;

class Klien extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Data Klien'];
        return view('admin/klien', $data);
    }
}