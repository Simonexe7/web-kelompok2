<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Transaksi::query();

        // FILTER TANGGAL
        if ($this->request->dari && $this->request->sampai) {
            $query->whereBetween('created_at', [
                $this->request->dari . ' 00:00:00',
                $this->request->sampai . ' 23:59:59'
            ]);
        }

        return $query->get()->map(function ($trx) {
            return [
                'ID' => $trx->id,
                'Tanggal' => $trx->created_at->format('d-m-Y H:i'),
                'Total' => $trx->total,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Tanggal', 'Total'];
    }
}
