<?php

namespace App\Exports;

use App\Models\Qurban;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QurbanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Qurban::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Peserta',
            'Nomor Rombongan',
            'Tanggal',
            'Tahun',
        ];
    }

    public function map($qurban): array
    {
        static $rowNumber = 0;
        $rowNumber++;

        return [
            $rowNumber,
            $qurban->name,
            $qurban->group_number,
            $qurban->date ? date('d-m-Y', strtotime($qurban->date)) : '',
            $qurban->date ? date('Y', strtotime($qurban->date)) : '',
        ];
    }
}