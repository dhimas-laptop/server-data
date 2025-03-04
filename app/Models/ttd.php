<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ttd extends Model
{
    use HasFactory;
    protected $table = "penandatangan";
    protected $fillable = [
            'namaPenandatangan',
            'nipPenandatangan',
            'jabatanPenandatangan'
    ];
    
}
