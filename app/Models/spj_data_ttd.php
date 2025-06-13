<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spj_data_ttd extends Model
{
    use HasFactory;
    protected $table = "spj_data_ttd";
    protected $fillable = [
        'nama_ttd',
        'nip_ttd',
        'jabatan_ttd'
    ];
}
