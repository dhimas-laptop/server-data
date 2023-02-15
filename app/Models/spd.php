<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spd extends Model
{
    use HasFactory;
    protected $table = "spd";
    protected $fillable = [
            'nomor_spt',
            'tgl_spt',
            'nomor_spd',
            'tgl_spd',
            'no_spm',
            'tujuan',
            'berangkat',
            'pulang', 
            'uang_harian',
            'pesawat',
            'no_penerbangan',
            'no_tiket',
            'kode_booking',
            'harga_pesawat',
            'taxi',
            'hotel',
            'harga_hotel',
            'no_telp',
            'provinsi',
            'total',
            'scan_spd',
            'scan_spt',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gambar()
    {
        return $this->belongsToMany(gambar::class);
    }
    
}
