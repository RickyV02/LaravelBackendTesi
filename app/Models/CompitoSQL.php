<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompitoSQL extends Model
{
    protected $table = 'compito_sql';
    public $timestamps = false;
    public $fillable = [
        'voto',
        'pdf'
    ];

    public function testoCompito()
    {
        return $this->hasOne(TestoCompito::class, 'sql_id');
    }
}
