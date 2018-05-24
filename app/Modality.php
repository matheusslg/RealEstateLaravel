<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    protected $table = 'modalities';

    protected $fillable = [
        'nome'
    ];

    public $timestamps = false;

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
