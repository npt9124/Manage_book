<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'author_id';
    protected $table = 'author';

    protected $fillable = [
        'name',
        'total_number_of_books',
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
