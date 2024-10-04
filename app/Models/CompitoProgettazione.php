<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompitoProgettazione extends Model
{
    protected $table = 'compito_progettazione';
    public $timestamps = false;

    public function domande(){
        return $this->hasMany(Domanda::class, 'progettazione_id');
    }

    public function testoCompito(){
        return $this->hasOne(TestoCompito::class, 'progettazione_id');
    }

}
