<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domanda extends Model
{
    protected $table = 'domanda';
    public $timestamps = false;

    public function compitoProgettazione(){
        return $this->belongsTo(CompitoProgettazione::class, 'progettazione_id');
    }
}
