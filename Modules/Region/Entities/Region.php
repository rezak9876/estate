<?php

namespace Modules\Region\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\City;
use Modules\Estate\Entities\Estate;
use Modules\Neighborhood\Entities\Neighborhood;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Region\Database\factories\RegionFactory::new();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function estates()
    {
        return $this->hasManyThrough(Estate::class, Neighborhood::class);
    }

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class);
    }
}
