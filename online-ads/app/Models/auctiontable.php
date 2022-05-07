<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auctiontable extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_id',
        'image'
        
        
    ];
    protected $table = 'auctionstable';

    public function auction(){
        return $this->belongsTo(Auction::class);
    }

}
