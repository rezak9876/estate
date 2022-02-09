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

    Const Check_box = 0 ;
    Const Integer = 1 ;
    Const Text = 2 ;



    public  static $text = [
        self::Check_box => 'چک باکس',
        self::Integer => 'مقدار',
        self::Text => 'متن',
    ];



    public static function text($type){
        return self::$text[$type];
    }


    public function gettypeName()
    {
        return self::$text[$this->type];
    }

}
