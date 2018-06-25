<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'nome',
        'id_categoria',
        'id_modalidade',
        'id_localizacao',
        'id_cidade',
        'id_estado',
        'localidade',
        'descricao',
        'geolocalizacao',
        'valor',
        'area',
        'tipo_area',
        'quartos',
        'banheiros',
        'garagens'
    ];

    protected $dates = ['deleted_at'];

    public function categories() {
        return $this->hasOne(Category::class);
    }

    public function modalities() {
        return $this->hasOne(Modality::class);
    }

    public function cities() {
        return $this->hasOne(City::class);
    }

    public function states() {
        return $this->hasOne(State::class);
    }

    public function locations() {
        return $this->hasOne(Location::class);
    }
}