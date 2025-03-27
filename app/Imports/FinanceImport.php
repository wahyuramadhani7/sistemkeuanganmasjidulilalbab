<?php


namespace App\Imports;

use App\Models\Finance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FinanceImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Finance([
            'description' => $row['keterangan'],
            'amount' => $row['jumlah'],
            'type' => $row['tipe'],
            'category' => $row['kategori'],
            'date' => $this->transformDate($row['tanggal']),
        ]);
    }

    // Fungsi untuk mengubah format tanggal dari Excel
    public function transformDate($value)
    {
        if (!$value) {
            return null;
        }

        try {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return $value; // Jika gagal, kembalikan nilai asli
        }
    }
}