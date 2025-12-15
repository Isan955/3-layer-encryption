<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockLedger extends Model
{
    protected $fillable = [
        'table_name',
        'record_id',
        'data',
        'timestamp',
        'previous_hash',
        'current_hash',
    ];
}
