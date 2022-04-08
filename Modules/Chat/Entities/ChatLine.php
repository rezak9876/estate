<?php

namespace Modules\Chat\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\File\Entities\File;

class ChatLine extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ChatLineFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public static $prefix_files = 'files/chats/';

    public function full_link()
    {
        return '/' . self::$prefix_files . $this->file->link;
    }
}
