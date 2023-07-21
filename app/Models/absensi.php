<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $fillable = [
        'nama',
        'jenis',
        'lokasi',
        'informasi',
        'tanggal'
    ];
    public function gambarpl(){
    	return $this->hasMany(gambarpl::class);
    }
}
