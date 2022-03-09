<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;
    protected $fillable = ['title','desc','img','price','condition','category_id','user_id'];


    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
