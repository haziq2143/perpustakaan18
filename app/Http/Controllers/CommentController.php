<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => 'required'
        ]);

        $validated['user_id'] = Auth::id();

        $validated['book_id'] = $id;
        $book = Book::where('id', $id)->first();
        Comment::create($validated);
        return redirect('/books/' . $book->title);
    }

    public function destroy(string $id)
    {
        $comment = Comment::where('id', $id);
        $comment->delete();
        return back();
    }
}
