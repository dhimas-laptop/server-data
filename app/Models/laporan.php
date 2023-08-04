<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $fillable = [
        'nama',
        'lokasi',
        'koordinat',
        'luas',
        'das',
        'kelurahan',
        'kecamatan',
        'kota',
        'total',
        'jenis',
        'lokasi',
        'question1',
        'question2',
        'question3',
        'question4',
        'question5',
        'question6',
        'question7',
        'question8',
        'question9',
        'question10',
        'question11',
        'pupuk1',
        'pupuk2',
        'pupuk3',
        'hidrogel1',
        'hidrogel2',
        'hidrogel3',
        'sulam1',
        'sulam2',
        'sulam13',
        'dolomit1',
        'dolomit2',
        'dolomit3',
        'penyiangan1',
        'penyiangan2',
        'penyiangan3',
        'pendangiran1',
        'pendangiran2',
        'pendangiran3',
        'pemupukan1',
        'pemupukan2',
        'pemupukan3',
        'penyulaman1',
        'penyulaman2',
        'penyulaman3',
        'pemberantasan1',
        'pemberantasan2',
        'pemberantasan3',
        'problem1',
        'problem2',
        'problem3',
        'problem4',
    ];
    public function gambarlaporan(){
    	return $this->hasMany(gambarlaporan::class);
    }
}
