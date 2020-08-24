<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'live'
    ];

    public function parent()
    {
        return $this->belongsTo(Section::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Section::class,'parent_id');
    }

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }

    public function scopeOfSort($query, $sort)
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }
}
