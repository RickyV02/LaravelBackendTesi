<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professore extends Model
{
    protected $table = 'professore';

    public function corsi(){
        return $this->belongsToMany(Corso::class, 'insegnamento', 'professore_id', 'corso_id');
    }
}
