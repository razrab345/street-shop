<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Products;
use App\Brands;
use App\ProductFilter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    protected $page;

	public function __construct()
	{
	  // Коллекция всех категорий
	  $this->category = Category::all();
	  // Коллекция всех страниц
	  $this->page = Page::all();

	}
	public function category_page($id, Request $request) {
		$category = $this->category->find($id);
		$name = $category->name;
		$description = $category->description;
		$catalog = $this->category;
		$page = $this->page;
		$products = Products::where('category_id', $id)->get();


		//тут нужно будет сдлеать вывод только в конкретной категории
		$sezon = Products::select('sezon')->get()->unique('sezon')->pluck('sezon');
		$brands = Brands::has('products')->pluck('name');
		$material = Products::select('material')->get()->unique('material')->pluck('material');

		//фильтр
		if ($request->has('submit_form')) {
			 $products = Products::query()->when($request->get('brand'), function ($query, $brands) {$query->whereHas('brand', function ($query) use ($brands) {$query->whereIn('name', $brands);});})->when($request->get('sezon'), function ($query, $sezons) {$query->whereIn('sezon', $sezons);})->when($request->get('material'), function ($query, $materials) {$query->whereIn('material', $materials);})->get();
		}



		return view('category', ['name' => $name, 'description' => $description, 'catalog' => $catalog, 'page' => $page, 'products' => $products, 'sezon' => $sezon, 'material' => $material, 'brands' => $brands]);
	}
	public function categories() {
        $catalog = $this->category;
		$page = $this->page;

		return view('categories', ['catalog' => $catalog, 'page' => $page]);
	}
}
