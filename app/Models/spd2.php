<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spd2 extends Model
{
    use HasFactory;
    protected $table = "spd2";
    protected $fillable = [
            'nomor_spt',
            'tgl_spt',
            'nomor_spd',
            'tgl_spd',
            'no_spm',
            'tujuan',
            'berangkat',
            'pulang', 
            'total',
            'nama_lain',
            'no_lain',
            'status_lain',
            'kode',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
