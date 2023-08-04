<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambarlaporan extends Model
{
    use HasFactory;
    protected $table = "gambarlaporan";
    protected $fillable = [
        'gambar',
        'laporan_id'
    ];
}
