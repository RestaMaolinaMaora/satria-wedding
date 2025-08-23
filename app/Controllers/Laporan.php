<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');
        $status    = $this->request->getGet('status');

        $data = [
            'laporan'           => $this->laporanModel->getLaporan($startDate, $endDate, $status),
            'totalAcara'        => $this->laporanModel->getTotalAcara(),
            'totalKlien'        => $this->laporanModel->getTotalKlien(),
            'persentaseSelesai' => $this->laporanModel->getPersentaseSelesai(),
        ];

        return view('admin/laporan/index', $data);
    }

    // ===== Export PDF =====
    public function exportPdf()
    {
        $laporan = $this->laporanModel->findAll();

        $html = view('admin/laporan/pdf', ['laporan' => $laporan]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan.pdf', ["Attachment" => true]);
    }

    // ===== Export Excel =====
    public function exportExcel()
    {
        $laporan = $this->laporanModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Client');
        $sheet->setCellValue('C1', 'Paket');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Waktu Mulai');
        $sheet->setCellValue('F1', 'Waktu Akhir');
        $sheet->setCellValue('G1', 'Status');

        // Isi data
        $row = 2;
        $no = 1;
        foreach ($laporan as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['nama_client']);
            $sheet->setCellValue('C' . $row, $data['paket']);
            $sheet->setCellValue('D' . $row, $data['tanggal']);
            $sheet->setCellValue('E' . $row, $data['waktu_mulai']);
            $sheet->setCellValue('F' . $row, $data['waktu_akhir']);
            $sheet->setCellValue('G' . $row, $data['status']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}