<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'nome'
    ];

    public $timestamps = false;

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
