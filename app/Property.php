<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = [
        'nome',
        'id_categoria',
        'id_modalidade',
        'id_cidade',
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

    public function categories() {
        return $this->hasOne(Category::class);
    }

    public function modalities() {
        return $this->hasOne(Modality::class);
    }

    public function cities() {
        return $this->hasOne(City::class);
    }
}