<?php

namespace App\Orchid\Layouts;

use App\Category;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class CategoriesLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('Список категорий')
                ->align('center')
                ->width('300px')->render(function (Category $category) {
                    return Link::make($category->title)->route('platform.categories', $category);;
                }),

            TD::set('created_at', 'Created'),
            TD::set('updated_at', 'Last edit'),
        ];
    }
}
