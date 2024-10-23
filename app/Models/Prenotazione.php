<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    protected $table = 'prenotazione';
    public $timestamps = false;

    public function studente()
    {
        return $this->belongsTo(Studente::class, 'studente_id');
    }

    public function appello()
    {
        return $this->belongsTo(Appello::class, 'appello_id');
    }

    public function testoCompito()
    {
        return $this->belongsTo(TestoCompito::class, 'compito_id');
    }
}
