<?php


namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Http\Controllers\Controller;





class HomeController extends Controller {

	protected $category;
    protected $catalog;

	public function __construct()
	{
	  // Коллекция всех категорий
	  $this->category = Category::all();
	  // Коллекция всех страниц
	  $this->page = Page::all();
	}

	public function Home() {
		$catalog = $this->category;
		$page = $this->page;
		
		return view('home', ['catalog' => $catalog, 'page' => $page]);
	}

}

?>