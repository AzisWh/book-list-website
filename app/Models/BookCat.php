<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function books(){
        return $this->hasMany(Book::class, 'id');
    }
}
