<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class jenistas extends Model
{
        protected $fillable =['jenis_tas', 'slug',];

        public function scopeGetParent($query)
        {
            return $query->whereNull('parent_id');
        }

        //public function setSlugAttribute($value)
        //{
         //   $this->attributes['slug'] = Str::slug($value);
        //}

        //ACCESSOR
        public function getNameAttribute($value)
        {
            return ucfirst($value);
        }
         //JENIS RELASINYA ADALAH ONE TO MANY, YANG BERARTI KATEGORI INI BISA DIGUNAKAN OLEH BANYAK PRODUK
        public function detailtas()
        {
            return $this->hasMany('App\detailtas', 'jenis_tas');
        }

        public function getRouteKeyName()
        {
            return 'slug';
        }
    }
