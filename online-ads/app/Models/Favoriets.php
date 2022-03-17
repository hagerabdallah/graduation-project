<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoriets extends Model
{
    protected $table = 'advertisment_user';
    protected $fillable = ['user_id','advertisment_id'];

    public function users()
    {
       return $this->belongsToMany(User::class );
    }

    public function advertisments()
    {
       return $this->belongsToMany(Advertisment::class, );
    }

    use HasFactory;
}
