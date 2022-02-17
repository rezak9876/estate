<?php

namespace Modules\Estate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Facility\Entities\Facility;
use Modules\Neighborhood\Entities\Neighborhood;
use Modules\Term\Entities\Term;

class Estate extends Model
{
    use HasFactory;


    protected $fillable = [
        'type', 'total_price', 'mortgage_price', 'rent_price', 'neighborhood_id', 'latitude', 'longitude', 'area',
        'year_of_construction', 'address', 'title', 'slug', 'description', 'use_type_id', 'use_type_property_id', 'main_picture'
    ];

    protected static function newFactory()
    {
        return \Modules\Estate\Database\factories\EstateFactory::new();
    }



    //======status
    const Buy_Sell = 0;
    const Mortgage_Rent = 1;
    const Presell = 2;
    const Exchange = 3;


    public static $text = [
        self::Buy_Sell => 'خرید و فروش',
        self::Mortgage_Rent => 'رهن و اجاره',
        self::Presell => 'پیش فروش',
        self::Exchange => 'معاوضه',
    ];


    public static function text($type)
    {
        return self::$text[$type];
    }

    public function type()
    {
        return self::$text[$this->type];
    }


    public function gettypeName()
    {
        return self::$text[$this->type];
    }

    public function use_type()
    {
        return $this->use_type_property->use_type();
    }
    public function use_type_property()
    {
        return $this->belongsTo(UseTypeProperty::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function region()
    {
        return $this->neighborhood->region();
    }

    public function city()
    {
        return $this->region->city();
    }

    public function province()
    {
        return $this->city->province();
    }



    public function check_type($id, $string)
    {
        if (old()) {
            if (($id == Estate::Mortgage_Rent) != (old('type') == Estate::Mortgage_Rent))
                return $string;
        } elseif (($id == Estate::Mortgage_Rent) != ($this->type == Estate::Mortgage_Rent)) {
            return $string;
        }
        return null;
    }

    public function year()
    {
        return verta()->year - $this->year_of_construction;
    }

    public function terms()
    {
        return $this->belongsToMany(Term::class);
    }

    public function intfacilities()
    {
        return $this->belongsToMany(Facility::class,'int_estate_facility')->withPivot('value');
    }
    public function txtfacilities()
    {
        return $this->belongsToMany(Facility::class,'txt_estate_facility')->withPivot('value');
    }
    public function boolfacilities()
    {
        return $this->belongsToMany(Facility::class,'bool_estate_facility');
    }

    
}
