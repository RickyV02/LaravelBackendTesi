<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corso extends Model
{
    protected $table = 'corso';
    public $timestamps = false;
    protected $fillable = ['canale', 'anno'];

    public function lezioni()
    {
        return $this->hasMany(Lezione::class, 'corso_id');
    }

    public function avvisi()
    {
        return $this->hasMany(Avvisi::class, 'corso_id');
    }

    public function professori()
    {
        return $this->belongsToMany(Professore::class, 'insegnamento', 'corso_id', 'professore_id');
    }

    public function studenti()
    {
        return $this->hasMany(Studente::class, 'assegnazione', 'corso_id', 'studente_id');
    }

    public function appelli()
    {
        return $this->hasMany(Appello::class, 'corso_id');
    }
}
