<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'author',
        'publisher',
        'publication_date',
        'category_id'];

    public function bookCat()
    {
        return $this->belongsTo(BookCat::class, 'category_id');
    }
}
