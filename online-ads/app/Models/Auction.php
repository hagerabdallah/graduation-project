<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'desc',
        'start_date',
        'img',
        'end_date',
        'min_price',
        'condition',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}








							