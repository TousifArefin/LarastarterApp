<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Module extends Model
{
    protected $guarded = ['id'];


    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
