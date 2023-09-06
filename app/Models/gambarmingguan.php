<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambarmingguan extends Model
{
    use HasFactory;
    protected $table = "gambarmingguan";
    protected $fillable = [
        'gambar',
        'laporan_id'
    ];
}
