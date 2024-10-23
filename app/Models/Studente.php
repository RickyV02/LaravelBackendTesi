<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studente extends Model
{
    protected $table = 'studente';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'password',
        'matricola',
    ];
    public function corsi()
    {
        return $this->belongsToMany(Corso::class, 'assegnazione', 'studente_id', 'corso_id');
    }

    public function prenotazioni()
    {
        return $this->hasMany(Prenotazione::class, 'studente_id');
    }
}
