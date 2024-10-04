<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avvisi extends Model
{
    protected $table = 'avvisi';
    public $timestamps = false;
    public $fillable = [
        'testo',
        'data_pubblicazione',
        'corso_id'
    ];
    
    public function corso(){
        return $this->belongsTo(Corso::class, 'corso_id');
    }
}
