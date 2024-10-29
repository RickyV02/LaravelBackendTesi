<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompitoProgettazione extends Model
{
    protected $table = 'compito_progettazione';
    public $timestamps = false;
    public $fillable = [
        'voto',
        'pdf'
    ];

    public function testoCompito()
    {
        return $this->hasOne(TestoCompito::class, 'progettazione_id');
    }
}
