<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

// EXCEL
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// PDF
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    private function laporanData()
    {
        return [

            [
                'nama' => 'Ahmad Rizki',
                'nim' => '22110001',
                'divisi' => 'Record Center',
                'hadir' => 24,
                'izin' => 2,
                'sakit' => 1,
                'alfa' => 0,
                'persentase' => '96%',
                'status' => 'Aktif',
            ],

            [
                'nama' => 'Sinta Permata',
                'nim' => '22110002',
                'divisi' => 'TU',
                'hadir' => 21,
                'izin' => 3,
                'sakit' => 0,
                'alfa' => 1,
                'persentase' => '90%',
                'status' => 'Aktif',
            ],

            [
                'nama' => 'Budi Santoso',
                'nim' => '22110003',
                'divisi' => 'Sarpras',
                'hadir' => 18,
                'izin' => 5,
                'sakit' => 2,
                'alfa' => 4,
                'persentase' => '81%',
                'status' => 'Nonaktif',
            ],

        ];
    }

    // =====================================
    // FILTER GLOBAL
    // =====================================
    private function filterLaporan($laporan)
    {
        $divisi = $this->request->getGet('divisi');
        $status = $this->request->getGet('status');

        // FILTER DIVISI
        if ($divisi && $divisi != 'Semua Divisi') {

            $laporan = array_filter($laporan, function ($item) use ($divisi) {

                return $item['divisi'] == $divisi;

            });

        }

        // FILTER STATUS
        if ($status && $status != 'Semua Status') {

            $laporan = array_filter($laporan, function ($item) use ($status) {

                return $item['status'] == $status;

            });

        }

        return $laporan;
    }

    // =====================================
    // INDEX
    // =====================================
    public function index()
    {
        $bulan = $this->request->getGet('bulan') ?? 'Mei';
        $tahun = $this->request->getGet('tahun') ?? '2026';

        $divisi = $this->request->getGet('divisi');
        $status = $this->request->getGet('status');

        $laporan = $this->laporanData();

        $laporan = $this->filterLaporan($laporan);

        // TOTAL
        $totalHadir = array_sum(array_column($laporan, 'hadir'));
        $totalIzin = array_sum(array_column($laporan, 'izin'));
        $totalSakit = array_sum(array_column($laporan, 'sakit'));
        $totalAlfa = array_sum(array_column($laporan, 'alfa'));

        $avgPersentase = 0;

        if (count($laporan) > 0) {

            $persen = array_map(function ($item) {

                return (int) str_replace('%', '', $item['persentase']);

            }, $laporan);

            $avgPersentase = round(array_sum($persen) / count($persen));

        }

        $data = [
            'title' => 'Laporan Absensi',

            'laporan' => $laporan,

            'bulan' => $bulan,
            'tahun' => $tahun,

            'divisi' => $divisi,
            'status' => $status,

            'totalHadir' => $totalHadir,
            'totalIzin' => $totalIzin,
            'totalSakit' => $totalSakit,
            'totalAlfa' => $totalAlfa,
            'avgPersentase' => $avgPersentase,
        ];

        return view('admin/laporan/index', $data);
    }

    // =====================================
    // EXPORT EXCEL
    // =====================================
    public function exportExcel()
    {
        $bulan = $this->request->getGet('bulan') ?? 'Mei';
        $tahun = $this->request->getGet('tahun') ?? '2026';

        $laporan = $this->laporanData();

        // FILTER
        $laporan = $this->filterLaporan($laporan);

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // HEADER
        $headers = [
            'Nama',
            'NIM',
            'Divisi',
            'Hadir',
            'Izin',
            'Sakit',
            'Alfa',
            'Persentase'
        ];

        $column = 'A';

        foreach ($headers as $header) {

            $sheet->setCellValue($column . '1', $header);

            $column++;
        }

        // DATA
        $row = 2;

        foreach ($laporan as $item) {

            $sheet->setCellValue('A' . $row, $item['nama']);
            $sheet->setCellValue('B' . $row, $item['nim']);
            $sheet->setCellValue('C' . $row, $item['divisi']);
            $sheet->setCellValue('D' . $row, $item['hadir']);
            $sheet->setCellValue('E' . $row, $item['izin']);
            $sheet->setCellValue('F' . $row, $item['sakit']);
            $sheet->setCellValue('G' . $row, $item['alfa']);
            $sheet->setCellValue('H' . $row, $item['persentase']);

            $row++;
        }

        $filename = 'laporan-' . strtolower($bulan) . '-' . $tahun . '.xlsx';

        // CLEAN BUFFER
        if (ob_get_length()) {

            ob_end_clean();

        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header(
            'Content-Disposition: attachment; filename="' . $filename . '"'
        );

        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    // =====================================
    // EXPORT PDF
    // =====================================
    public function exportPdf()
    {
        $bulan = $this->request->getGet('bulan') ?? 'Mei';
        $tahun = $this->request->getGet('tahun') ?? '2026';

        $laporan = $this->laporanData();

        // FILTER
        $laporan = $this->filterLaporan($laporan);

        $html = view('admin/laporan/pdf', [
            'laporan' => $laporan,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream(
            'laporan-' . strtolower($bulan) . '-' . $tahun . '.pdf',
            ['Attachment' => true]
        );
    }
}