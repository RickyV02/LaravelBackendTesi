<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'query';
    public $timestamps = false;

    public function compitoSQL(){
        return $this->belongsTo(CompitoSQL::class, 'sql_id');
    }
}
