<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imege extends Model
{
    use HasFactory;
    protected $fillable = ['advertisment_id','image'];
    protected $guarded = [];
    public function advertisment()
    {
        return $this->belongsTo(Advertisment::class);
    }
}
