<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valutazione extends Model
{
    protected $table = 'valutazione';
    public $timestamps = false;

    public function studente(){
        return $this->belongsTo(Studente::class, 'studente_id');
    }

    public function appello(){
        return $this->belongsTo(Appello::class, 'appello_id');
    }

    public function testoCompito(){
        return $this->belongsTo(TestoCompito::class, 'compito_id');
    }

    public function valutazioneQuery(){
        return $this->hasMany(ValutazioneQuery::class, 'valutazione_id');
    }

    public function valutazioneDomanda(){
        return $this->hasMany(ValutazioneDomanda::class, 'valutazione_id');
    }
}
