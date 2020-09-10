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
use Orchid\Screen\Actions\Link;

class CategoryScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Категория';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Редактирование категории';


    /**
     * Query data.
     *
     * @return array
     */
    public function query($id): array
    {
        return [
            'category_name' => Category::find($id)->name,
            'category_id' => Category::find($id)->id,
            'category_description' => Category::find($id)->description,
        ];
    }
    public function commandBar(): array
    {
        return [
            Button::make('Сохранить')->method('save_category')->rawClick(),
            Button::make('Удалить')->method('delete_category')->rawClick(),
        ];
    }
    public function layout(): array
    {
        return [
            Layout::view('admin/category_admin')
        ];
    }
    public function save_category($id, Request $request)
    {
        $title_new = $request->new_title;
        $desc_new = $request->new_desc;
        $title_upd = Category::find($id)->update(['name' => $title_new]);
        $desc_upd = Category::find($id)->update(['description' => $desc_new]);
        Alert::success('Категория обновилась успешно');
        return back();
    }

    public function delete_category($id)
    {
        $delete_cat = Category::find($id)->delete();
        Alert::success('Категория удалилась успешно');
        return redirect('/dashboard/categories');;
    }
}
