<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambarpl extends Model
{
    use HasFactory;
    protected $table = "gambarpl";
    protected $fillable = [
        'gambar',
        'absensi_id'
    ];
}
