<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spj_data_satker extends Model
{
    use HasFactory;
    protected $table = "spj_data_satker";
    protected $fillable = [
        'kementerian',
        'eselon',
        'lokasi',
        'satker',
        'alamat',
        'dipa',
        'tgl_dipa'
    ]; 
}
