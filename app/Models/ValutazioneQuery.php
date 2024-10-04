<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValutazioneQuery extends Model
{
    protected $table = 'valutazione_query';
    public $timestamps = false;

    public function queryRelazione(){
        return $this->belongsTo(Query::class, 'query_id');
    }

    public function valutazione(){
        return $this->belongsTo(Valutazione::class, 'valutazione_id');
    }
}
