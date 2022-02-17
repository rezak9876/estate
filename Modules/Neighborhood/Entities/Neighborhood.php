<?php

namespace Modules\Neighborhood\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Estate\Entities\Estate;
use Modules\Region\Entities\Region;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Neighborhood\Database\factories\NeighborhoodFactory::new();
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function estates()
    {
        return $this->hasMany(Estate::class);
    }

    public function province()
    {
        return $this->city->province();
    }

    public function city()
    {
        return $this->region->city();
    }
}
