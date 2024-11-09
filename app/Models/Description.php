<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'description'
    ];

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
