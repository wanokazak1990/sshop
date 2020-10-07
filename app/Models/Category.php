<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getRouteKeyName() {
        return 'slug';
    }

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

    public function getChainToParent($id=0, &$mas = '', $categories = '')
    {
        if(empty($categories))
        {
            $categories = $this->ofSort(['name' => 'asc', 'sort' => 'asc'])
                ->get();
            $mas = collect();
        }

        foreach ($categories as $key => $itemCat) 
        {
            if($itemCat->id == $id)
            {
                if($itemCat->parent_id)
                {
                    $id = $itemCat->parent_id;
                    $mas->push($itemCat);
                    $this->getChainToParent($id,$mas,$categories);
                }
            }
        }

        return ($mas);
    }

    public function getChainToChild($id, &$mas = '', $categories = '')
    {
        if(empty($categories))
        {
            $categories = $this->ofSort(['name' => 'asc', 'sort' => 'asc'])
                ->get();
            $mas = collect();
            $mas->push($this);
        }

        foreach ($categories as $key => $item) {
            if($item->parent_id == $id)
            {
                $mas->push($item);
                if($item->children->isNotEmpty())
                {
                    $this->getChainToChild($item->id,$mas,$item->children);
                }
            }
        }

        return $mas;
    }

    
}
