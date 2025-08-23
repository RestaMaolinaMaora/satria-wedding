<?php

namespace App\Controllers;

use App\Models\KlienModel;
use App\Models\PaketModel;
use App\Models\JadwalAcaraModel;

class Dashboard extends BaseController
{
    public function index($year = null, $month = null)
    {
        if (!session()->get('logged_in')) return redirect()->to('/login');

        $year  = (int)($year  ?? date('Y'));
        $month = (int)($month ?? date('m'));

        $klienModel  = new KlienModel();
        $paketModel  = new PaketModel();
        $jadwalModel = new JadwalAcaraModel();

        // ringkasan data
        $totalKlien    = $klienModel->countAll();
        $acaraBulanIni = $jadwalModel->where('YEAR(tanggal_acara)', $year)
                                     ->where('MONTH(tanggal_acara)', $month)
                                     ->countAllResults();
        $paketTerlaris = $paketModel->select('paket.nama_paket, COUNT(jadwal_acara.id_paket) AS total')
                                    ->join('jadwal_acara', 'jadwal_acara.id_paket = paket.id_paket')
                                    ->groupBy('paket.id_paket')
                                    ->orderBy('total','DESC')
                                    ->first();
        $jadwalTerdekat = $jadwalModel->select('jadwal_acara.*, klien.nama_klien, paket.nama_paket')
                                      ->join('klien','klien.id_klien = jadwal_acara.id_klien')
                                      ->join('paket','paket.id_paket = jadwal_acara.id_paket')
                                      ->where('tanggal_acara >=', date('Y-m-d'))
                                      ->orderBy('tanggal_acara','ASC')
                                      ->limit(5)
                                      ->findAll();

        // panggil helper & buat kalender
        helper('calendar');
        $calendar = generate_calendar($year, $month);

        return view('admin/dashboard', [
            'title'          => 'Dashboard Admin',
            'nama'           => session()->get('nama_user'),
            'year'           => $year,
            'month'          => $month,
            'calendar'       => $calendar,
            'totalKlien'     => $totalKlien,
            'acaraBulanIni'  => $acaraBulanIni,
            'paketTerlaris'  => $paketTerlaris['nama_paket'] ?? '-',
            'jadwalTerdekat' => $jadwalTerdekat,
        ]);
    }
}