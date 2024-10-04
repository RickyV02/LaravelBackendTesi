<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestoCompito extends Model
{
    protected $table = 'testo_compito';
    public $timestamps = false;

    public function compitoSQL(){
        return $this->belongsTo(CompitoSQL::class, 'sql_id');
    }

    public function compitoProgettazione(){
        return $this->belongsTo(CompitoProgettazione::class, 'progettazione_id');
    }
}
