<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class detailtas extends Model
{
    protected $guarded = [];

    //public function getStatusLabelAttribute()
    //{
     //  if ($this->status == 0) {
     //       return '<span class="badge badge-secondary">Draft</span>';
        //}
        //return '<span class="badge badge-success">Aktif</span>';
    //}

    //public function setSlugAttribute($value)
    //{
     //   $this->attributes['slug'] = Str::slug($value);
    //}

    public function jenistas()
    {
        return $this->belongsTo('App\jenistas', 'jenis_tas');
    }
    public function bahantas()
    {
        return $this->belongsTo('App\bahantas', 'bahan_tas');
    }

    public function getRouteKeyName()
	{
	return 'slug';
	}
}