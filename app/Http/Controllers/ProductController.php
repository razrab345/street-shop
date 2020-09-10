<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Page;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->category = Category::all();
        $this->product = Products::all();
        $this->page = Page::all();

    }

    public function show($id)
    {
        $product = $this->product->find($id);
        $catalog = $this->category;
        $page = $this->page;

        return view('product', ['product' => $product, 'catalog' => $catalog, 'page' => $page]);

    }
}
