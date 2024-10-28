<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    use HasFactory;

    protected $table = 'prenotazione';

    protected $fillable = [
        'esito',
        'studente_id',
        'appello_id',
    ];

    public function studente()
    {
        return $this->belongsTo(Studente::class);
    }

    public function appello()
    {
        return $this->belongsTo(Appello::class);
    }
}
