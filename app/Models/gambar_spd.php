<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_spd extends Model
{
    use HasFactory;
    protected $table = "gambar_spd";
    protected $fillable = [
        'gambar_id',
        'spd_id'
    ];
}
