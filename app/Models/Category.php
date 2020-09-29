<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'img',
        'parent_id',
        'sort',
        'live'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
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

    public function getPathImageAttribute()
    {
        if(!empty($this->img))
            return storage_path('app/public/'.$this->getTable().'/'.$this->img);
    }

    public function getUrlImageAttribute()
    {
        if(!empty($this->img))
            return ('storage/'.$this->getTable().'/'.$this->img);
    }
}
