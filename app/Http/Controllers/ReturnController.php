<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Fine;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('returns.index');
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

            'code_book' => 'required',
            'code_unique' => 'required'
        ]);

        $user = User::where('code_unique', $validated['code_unique'])->first();

        $book = Book::where('code_book', $validated['code_book'])->first();

        $loan = Loan::where('book_id', $book->id)
            ->where('user_id', $user->id)
            ->whereNull('return_date')
            ->first();

        $loan->update([
            'return_date' =>  Carbon::now()->format('Y-m-d')
        ]);

        $returnDate = Carbon::parse($loan->return_date);
        $dueDate = Carbon::parse($loan->due_date);

        $daysDifference = $dueDate->diffInDays($returnDate);
        $book->update([
            'stock' => $book->stock + 1,
        ]);

        $loan->update([
            'status' => 'Dikembalikan'
        ]);

        if ($daysDifference > 0) {
            $fine = Fine::create([
                'loan_id' => $loan->id,
                'amount' => 5000 * $daysDifference,
                'paid' => FALSE
            ]);


            return redirect('/fines/' . $fine->id);
        } else {
            return redirect('/books')->with('success', true);
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
