<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Category;
use App\Products;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\CategoriesLayout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

class ProductsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ProductsScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'ProductsScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'products' => Products::all(),
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
            ModalToggle::make('Добавить товар')->method('add_product')->modal('add_product')->rawClick(),
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
            Layout::view('admin/products_admin'),
            Layout::modal('add_product', [
                Layout::rows([
                    Input::make('parent_create')
                        ->title('Родительская категория')
                        ->placeholder('Родительская категория')
                        ->required(),
                    Input::make('title_create')
                        ->title('Название товара')
                        ->placeholder('Новый товар')
                        ->required(),
                    Input::make('price_create')
                        ->title('Цена товара')
                        ->placeholder('1000')
                        ->required(),
                    Input::make('quantity_create')
                        ->title('Количество')
                        ->placeholder('1')
                        ->required(),
                    Input::make('article_create')
                        ->title('Артикул')
                        ->placeholder('123342')
                        ->required(),
                    Input::make('sezon_create')
                        ->title('Сезон')
                        ->placeholder('Лето')
                        ->required(),
                    TextArea::make('description_create')
                        ->max(255)
                        ->rows(5)
                        ->required()
                        ->title('Описание товара'),
                    Input::make('razmer_create')
                        ->title('Размер')
                        ->placeholder('41')
                        ->required(),
                    Input::make('material_create')
                        ->title('Материал')
                        ->placeholder('Ткань')
                        ->required(),
                    Upload::make('img_create')
                        ->title('Изображение товара')
                        ->multiple(false)
                        ->storage('images')
                        ->required(),
                    Input::make('meta_k_create')
                        ->title('Meta key')
                        ->placeholder('Meta key')
                        ->required(),
                    Input::make('meta_d_create')
                        ->title('Meta description')
                        ->placeholder('Meta description')
                        ->required(),
                ]),
            ])->title('Новый товар'),
        ];
    }

    public function add_product(Request $request){
        $parent_create = $request->parent_create;
 //     $img_create = $request->img_create;
        $attachment = Attachment::find($request->img_create[0]);
        $img_create = $attachment ? $attachment->physicalPath() : null;
//        var_dump($request->img_create);
        $price_create = $request->price_create;
        $quantity_create = $request->quantity_create;
        $sezon_create = $request->sezon_create;
        $razmer_create = $request->razmer_create;
        $article_create = $request->article_create;
        $material_create = $request->material_create;
        $title_create = $request->title_create;
        $description_create = $request->description_create;
        $meta_k_create = $request->meta_k_create;
        $meta_d_create = $request->meta_d_create;
        $add_product = Products::create(array(
            'category_id' => $parent_create,
            'name'  => $title_create,
            'brand_id'  => 0,
            'price'  => $price_create,
            'quantity'  =>  $quantity_create,
            'article'  =>  $article_create,
            'sezon'  => $sezon_create,
            'description' => $description_create,
            'razmer'  => $razmer_create,
            'material'  => $material_create,
            'url' => $title_create,
            'img' => $img_create,
            'meta_key' => $meta_k_create,
            'meta_description' => $meta_d_create,
        ));
        Alert::success('Товар успешно создан');
        return back();
    }
}
