<?php

namespace CleaniqueCoders;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    protected $casts = [
        'data' => 'array',
    ];

    protected $fillable = [
        'key', 'data',
    ];
}
