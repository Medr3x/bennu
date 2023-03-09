<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeService extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    
    protected $fillable = [
        'code',
        'name'
    ];
}