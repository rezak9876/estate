<?php

namespace Modules\Facility\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','type'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Facility\Database\factories\FacilityFactory::new();
    }
}
