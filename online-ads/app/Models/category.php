<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc','is_accepted','is_active'];
    
    public function advertisments()
    {
      return $this->hasMany(Advertisment::class);
    }

}
