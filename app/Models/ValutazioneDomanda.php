<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValutazioneDomanda extends Model
{
    protected $table = 'valutazione_domanda';
    public $timestamps = false;

    public function compitoProgettazione(){
        return $this->belongsTo(CompitoProgettazione::class, 'progettazione_id');
    }

    public function valutazione(){
        return $this->belongsTo(Valutazione::class, 'valutazione_id');
    }
}
