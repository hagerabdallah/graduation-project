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
        'is_accepted',
        'is_active',
        'created_at',
         'address',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function prices()
    {
        
            return $this->hasMany(Price::class);
        
    }
    public function images(){
        return $this->hasMany(auctiontable::class);
    }
   
}








							