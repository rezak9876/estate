<?php

namespace Modules\Term\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Term\Database\factories\TermFactory::new();
    }
}
