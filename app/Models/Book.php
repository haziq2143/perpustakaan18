<?php

namespace App\Models;

use App\Models\Description;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'description_id',
        'title',
        'image',
        'author',
        'pages',
        'stock',
        'shelf_number',
        'code_book'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
