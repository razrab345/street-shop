<?php

namespace App\Orchid\Screens;


use Orchid\Screen\Screen;
use App\Category;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\CategoriesLayout;
use Orchid\Screen\Actions\ModalToggle;

class CategoriesScreen extends Screen
{

    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Категории';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Добавление и редактирование категорий';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'categories' => Category::all(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Добавить категорию')->method('add_category')->modal('add_cat')->rawClick(),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::view('admin/categories_admin'),
            Layout::modal('add_cat', [
                Layout::rows([
                    Input::make('title_create')
                        ->title('Название категории')
                        ->placeholder('Новая категория')
                        ->required(),
                    TextArea::make('description_create')
                        ->max(255)
                        ->rows(5)
                        ->required()
                        ->title('Описание категории'),
                ]),
            ])->title('Новая категория'),
        ];

    }

    public function add_category(Request $request){
        $title_create = $request->title_create;
        $description_create = $request->description_create;
        $add_category = Category::create(array(
            'parent_id'  => 0,
            'name'  => $title_create,
            'description' => $description_create,
            'url' => $title_create,
            'img' => $title_create,
            'meta_key' => $title_create,
            'meta_description' => $title_create,
        ));
        Alert::success('Категория успешно создана');
        return back();
    }


}
