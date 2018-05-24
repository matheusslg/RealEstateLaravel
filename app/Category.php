<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'nome'
    ];

    public $timestamps = false;

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
