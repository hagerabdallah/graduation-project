<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    protected $fillable = ['title','desc','img','price','condition','category_id','user_id','is_accepted','is_active','address'];

    // ,'category_id'
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function rating()
    {
    return $this->hasMany(Rating::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }


}
