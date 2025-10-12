<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "ratings";
    protected $fillable = [
        'user_id',
        'prod_id',
        'star_rated'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}



