<?php
namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

Class NavigationMenu{

    public function compose(View $view)
    {
        $categoryItems = Category::isLive()
            ->ofSort(['parent_id' => 'asc', 'sort' => 'asc'])
            ->get();

        $categoryItems = $this->buildTree($categoryItems);
        return $view->with('categoryItems', $categoryItems);
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $items->where('parent_id', null);
    }
}
