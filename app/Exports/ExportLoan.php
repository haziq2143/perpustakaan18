<?php

namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLoan implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Loan::with(['user', 'book'])
            ->get()
            ->map(function ($loan) {
                return [
                    $loan->id,
                    $loan->user->name,
                    $loan->book->title,
                    $loan->created_at->format('Y-m-d'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Loan ID',
            'User Name',
            'Book Title',
            'Loan Date',
        ];
    }
}
