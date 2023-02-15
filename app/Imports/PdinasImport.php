<?php

namespace App\Imports;

use App\Models\pdinas;
use Maatwebsite\Excel\Concerns\ToModel;

class PdinasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pdinas([
            //
        ]);
    }
}
