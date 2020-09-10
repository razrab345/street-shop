<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Category;
use App\Products;
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

class ProductScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ProductScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'ProductScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query($id): array
    {
        return [
            'product_name' => Products::find($id)->title,
            'product_id' => Products::find($id)->id,
            'product_price' => Products::find($id)->price,
            'product_description' => Products::find($id)->description,
            'product_quantity' => Products::find($id)->quantity,
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
            Button::make('Сохранить')->method('save_product')->rawClick(),
            Button::make('Удалить')->method('delete_product')->rawClick(),
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
            Layout::view('admin/product_admin')
        ];
    }

    public function save_product($id, Request $request)
    {
        $title_new = $request->new_title;
        $price_new = $request->new_price;
        $desc_new = $request->new_desc;
        $quantity_new = $request->new_quantity;
        $title_upd = Products::find($id)->update(['title' => $title_new]);
        $price_upd = Products::find($id)->update(['price' => $price_new]);
        $desc_upd = Products::find($id)->update(['description' => $desc_new]);
        $quantity_upd = Products::find($id)->update(['quantity' => $quantity_new]);
        Alert::success('Продукт обновился успешно');
        return back();
    }

    public function delete_product($id)
    {
        $delete_product = Products::find($id)->delete();
        Alert::success('Продукт удалился успешно');
        return redirect('/dashboard/products');;
    }
}
