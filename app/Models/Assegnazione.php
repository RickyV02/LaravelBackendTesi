<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assegnazione extends Model
{
    use HasFactory;

    protected $table = 'assegnazione';

    protected $fillable = [
        'corso_id',
        'studente_id',
    ];

    public function corso()
    {
        return $this->belongsTo(Corso::class, 'corso_id');
    }

    public function studente()
    {
        return $this->belongsTo(Studente::class, 'studente_id');
    }
}