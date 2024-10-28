<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appello extends Model
{
    use HasFactory;

    protected $table = 'appello';

    protected $fillable = [
        'data',
        'corso_id',
        'compito_id',
    ];

    public function corso()
    {
        return $this->belongsTo(Corso::class);
    }

    public function compito()
    {
        return $this->belongsTo(TestoCompito::class);
    }
}
