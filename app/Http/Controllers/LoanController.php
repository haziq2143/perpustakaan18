<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loans.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code_book' => 'required|max:11|min:11',
            'code_unique' => 'required|min:6|max:6'
        ]);
        $book = Book::where('code_book', $validated['code_book'])->first();

        if ($book->stock > 0) {
            $user = User::where('code_unique', $validated['code_unique'])->first();

            $validated['loan_date'] = Carbon::now()->format('Y-m-d');
            $validated['due_date'] = Carbon::now()->addDays(3)->format('Y-m-d');
            $validated['status'] = "Dipinjam";

            Loan::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
                'loan_date' => $validated['loan_date'],
                'due_date' => $validated['loan_date'],
                'status' => $validated['status']
            ]);

            $book->update([
                'stock' => $book->stock - 1
            ]);

            return redirect('/books')->with('loan', true);
        } else {
            return redirect('/loans')->with('stock', true);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
