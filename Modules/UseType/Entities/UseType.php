<?php

namespace Modules\UseType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UseTypeProperty\Entities\UseTypeProperty;

class UseType extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\UseType\Database\factories\UseTypeFactory::new();
    }
    public function usetypeproperties()
    {
        return $this->hasMany(UseTypeProperty::class);
    }
}
