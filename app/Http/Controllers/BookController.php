<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Descriptor\Descriptor;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|file|max:4120',
            'author' => 'required',
            'pages' => 'required',
            'stock' => 'required',
            'shelf_number' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:10'
        ]);

        $validated['code_book'] = 'HAZZ.' . rand(100000, 999999);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $image = 'images/' . $imageName;
        $validated['image'] = $image;


        $description = Description::create([
            'description' => $validated['description']
        ]);

        $validated['description_id'] = $description->id;

        Book::create($validated);

        return redirect('/books')->with('book', true);
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
        $categories = Category::query()->get();
        $book = Book::where('id', $id)->first();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required',
            'stock' => 'required',
            'shelf_number' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'image' => 'file|max:5120'
        ]);

        $book = Book::findOrFail($id);
        $description = Description::findOrFail($book->description->id);

        $description->update([
            'description' => $validated['description']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            if (file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }


            $image->move(public_path('images'), $imageName);



            $validated['image'] = 'images/' . $imageName;
            $book->update($validated);
        }
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $description = Description::findOrFail($book->description->id);
        unlink(public_path($book->image));
        $book->delete();
        $description->delete();

        return redirect('/books');
    }
}
