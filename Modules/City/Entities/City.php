<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Province\Entities\Province;
use Modules\Region\Entities\Region;

class City extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\City\Database\factories\CityFactory::new();
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
