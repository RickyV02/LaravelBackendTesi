<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appello extends Model
{
    protected $table = 'appello';
    public $timestamps = false;
    
    public function corso(){
        return $this->belongsTo(Corso::class, 'corso_id');
    }

    public function valutazioni(){
        return $this->hasMany(Valutazione::class, 'appello_id');
    }
}
