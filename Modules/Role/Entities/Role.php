<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Permission\Entities\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug'];
    
    protected static function newFactory()
    {
        return \Modules\Role\Database\factories\RoleFactory::new();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
