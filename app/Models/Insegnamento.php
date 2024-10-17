<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insegnamento extends Model
{
    use HasFactory;

    protected $table = 'insegnamento';

    protected $fillable = [
        'professore_id',
        'corso_id',
    ];

    public function professore()
    {
        return $this->belongsTo(Professore::class, 'professore_id');
    }

    public function corso()
    {
        return $this->belongsTo(Corso::class, 'corso_id');
    }
}