<?php
namespace App\Http\ViewComposers;

use App\Models\Section;
use Illuminate\View\View;

Class NavigationMenu{

    public function compose(View $view)
    {
        $sectionItems = Section::isLive()
            ->ofSort(['parent_id' => 'asc', 'sort' => 'asc'])
            ->get();

        $sectionItems = $this->buildTree($sectionItems);

        return $view->with('sectionItems', $sectionItems);
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
