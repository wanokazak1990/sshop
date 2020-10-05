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
        'live',        
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

    public function recursiveArr($obj, &$mas, $step = '')
    {
        foreach ($obj as $key => $itemObj) {
            $mas[$itemObj->id] = $step.$itemObj->name;
            if($itemObj->children->isNotEmpty())
            {
                $preStep = $step;
                $step.=$itemObj->name.'-->';
                $this->recursiveArr($itemObj->children,$mas,$step);
                $step = $preStep;
            }
        }
    }

    public static function getArrayForSelect()
    {
        $categories = self::ofSort(['name' => 'asc', 'sort' => 'asc'])
            ->get();
        $grouped = $categories->groupBy('parent_id');
        
        foreach ($categories as $item)         
            if ($grouped->has($item->id))             
                $item->children = $grouped[$item->id]; 

        $mas = [];
        $obj = new Category;
        $obj->recursiveArr($categories->where('parent_id',null), $mas);
        
        return $mas;
    }

    
}
