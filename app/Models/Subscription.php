<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    
    protected $fillable = [
        'type_service_id',
        'user_id',
        'active'
    ];
}