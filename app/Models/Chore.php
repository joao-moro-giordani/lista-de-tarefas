<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chore extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_done',
        'image'
    ];

    protected $casts = [
        'is_done' => 'boolean',
    ];
}
