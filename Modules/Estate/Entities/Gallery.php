<?php

namespace Modules\Estate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Estate\Database\factories\GalleryFactory::new();
    }

    public static $prefix_images = '/images/estate/';
    public static $prefix_thumbnail = 'thumbnail_' ;
}
