<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahantas extends Model
{
    public function detailtas()
        {
            return $this->hasMany('App\detailtas', 'bahan_tas');
        }
}
