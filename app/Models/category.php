<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function movie()
    {
        return $this->hasMany(Movie::class);
    }

    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_image',
    ];
}
