<?php

namespace Modules\WhatsApp\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Whatsapp extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\WhatsApp\Database\factories\WhatsappFactory::new();
    }
}
