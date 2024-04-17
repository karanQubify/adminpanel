<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Service extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasMany(ServiceList::class);
    }
}
