<?php

namespace Modules\Chat\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ChatFactory::new();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
