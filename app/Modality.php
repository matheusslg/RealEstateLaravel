<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modality extends Model
{
    use SoftDeletes;

    protected $table = 'modalities';

    protected $fillable = [
        'nome'
    ];

    protected $dates = ['deleted_at'];

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
