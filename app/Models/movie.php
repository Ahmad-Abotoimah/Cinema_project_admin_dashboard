<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    use HasFactory;

    protected $fillable = [
        'movie_name',
        'movie_rate',
        'movie_description',
        'movie_image',
        'movie_trailer',
        'movie_price',
        'movie_cinemas',
        'movie_sale_status',
        'movie_new_price',
        'movie_is_new',
        'movie_daily_show',
        'category_id',
    ];
}
