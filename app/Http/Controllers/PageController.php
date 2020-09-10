<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
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

    public function page($url) {
        $page_info = Page::where('url', $url)->get();
        $title = $page_info[0]->title;
        $description = $page_info[0]->description;
        $catalog = $this->category;
        $page = $this->page;

        return view('page', ['page' => $page, 'catalog' => $catalog, 'title' => $title, 'description' => $description]);
    }

}