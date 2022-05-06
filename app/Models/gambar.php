<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    use HasFactory;

    public function spd()
    {
        return $this->belongsToMany(spd::class);
    }
    
}
