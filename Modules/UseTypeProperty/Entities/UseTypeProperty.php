<?php

namespace Modules\UseTypeProperty\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UseTypeProperty extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\UseTypeProperty\Database\factories\UseTypePropertyFactory::new();
    }
}
