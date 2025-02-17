<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestoCompito extends Model
{
    use HasFactory;

    protected $table = 'testo_compito';

    protected $fillable = [
        'sql_id',
        'progettazione_id',
    ];

    public function compitoSql()
    {
        return $this->hasOne(CompitoSql::class, 'sql_id');
    }

    public function compitoProgettazione()
    {
        return $this->hasOne(CompitoProgettazione::class, 'progettazione_id');
    }
}
