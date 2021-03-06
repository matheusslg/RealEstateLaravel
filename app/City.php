<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'codigo',
        'nome',
        'uf'
    ];

    public $timestamps = false;

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
