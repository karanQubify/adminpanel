<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class IndustryList extends Model
{
    use HasFactory;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        
        $this->attributes['slug'] = Str::slug($value, '_');
    }

    public function type()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }
}
