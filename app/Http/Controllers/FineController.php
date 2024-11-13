<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fine;
use Illuminate\Http\Request;


class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $fine = Fine::where('id', $id)->first();
        $returnDate = Carbon::parse($fine->loan->return_date);
        $dueDate = Carbon::parse($fine->loan->due_date);
        $daysDifference = $dueDate->diffInDays($returnDate);
        return view('admin.fines.index', compact('fine', 'daysDifference'));
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
    public function store(string $id)
    {
        $fine = Fine::where('id', $id)->first();

        $fine->update([
            'paid' => true
        ]);

        return redirect('/books')->with('payment', true);
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
