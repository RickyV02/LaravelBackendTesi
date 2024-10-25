<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appello extends Model
{
    protected $table = 'appello';
    public $timestamps = false;
    protected $fillable = ['data', 'corso_id'];

    public function corso()
    {
        return $this->belongsTo(Corso::class, 'corso_id');
    }

    public function prenotazione()
    {
        return $this->hasMany(Prenotazione::class, 'appello_id');
    }
}
