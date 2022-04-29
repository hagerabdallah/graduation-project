<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $fillable = ['rating', 'advertisment_id', 'user_id'];
    public function user()
    {
       
           return $this->belongsTo(User::class);
     
}
public function advertisment()
    {
       
           return $this->belongsTo(Advertisment::class);
     
}
}
