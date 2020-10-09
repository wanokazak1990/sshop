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
        'final',       
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
            if(isset($itemObj->childrens))
            {
                $preStep = $step;
                $step.=$itemObj->name.'-->';
                $this->recursiveArr($itemObj->childrens,$mas,$step);
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
                $item->childrens = $grouped[$item->id]; 

        $mas = [];
        $obj = new Category;
        $obj->recursiveArr($categories->where('parent_id',null), $mas);
        
        return $mas;
    }

    public function getChainToParent($id=0, $mas = '', $categories = '')
    {
        if(empty($categories))
        {
            $categories = $this->ofSort(['name' => 'asc', 'sort' => 'asc'])
                ->get();
            $mas = collect();
        }

        foreach ($categories as $key => $itemCat) 
        {
            if($itemCat->id == $id && $itemCat->parent_id != 0 && isset($categories[$key]))
            {
                    unset($categories[$key]);
                    $id = $itemCat->parent_id;
                    $mas->push($itemCat);
                    $this->getChainToParent($id,$mas,$categories);
                
            }
            elseif ($itemCat->id == $id && $itemCat->parent_id==0){
                $mas->push($itemCat);
                unset($categories[$key]);
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

            $grouped = $categories->groupBy('parent_id');

            foreach ($categories as $item)         
                if ($grouped->has($item->id))             
                    $item->childrens = $grouped[$item->id]; 

            $mas = collect();
            $mas->push($this);

        }

        

        foreach ($categories as $key => $item) {
            if($item->parent_id == $id)
            {
                $mas->push($item);
                if(isset($item->childrens))
                {
                    $this->getChainToChild($item->id,$mas,$item->childrens);
                }
            }
        }

        return $mas;
    }

    
}
