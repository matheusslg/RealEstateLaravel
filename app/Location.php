<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';

    protected $fillable = [
        'nome'
    ];

    protected $dates = ['deleted_at'];

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
