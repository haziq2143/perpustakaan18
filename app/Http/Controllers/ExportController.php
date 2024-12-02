<?php

namespace App\Http\Controllers;

use App\Exports\ExportLoan;
use ExportLoan as GlobalExportLoan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ExportLoan, 'loan.xlsx');
    }
}
