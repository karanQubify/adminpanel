<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class TechnologyList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'technology_id',
        'icon'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        
        $this->attributes['slug'] = Str::slug($value, '_');
    }

    public function type()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }
}
