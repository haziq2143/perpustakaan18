<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // untuk menghitung seluruh value dari kolom stock yang ada di table books
        $book = Book::sum('stock');
        $user = User::where('role', 'user')->count();
        $loans = Loan::selectRaw('DATE(loan_date) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        $dates = $loans->pluck('date')->toArray(); // Array tanggal
        $totals = $loans->pluck('total')->toArray(); // Array jumlah peminjam
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];
        return view('admin.home.index', compact('dates', 'totals', 'book', 'user', 'data'));
        // return dd($loans);
    }
}
