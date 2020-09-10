<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)->name('platform.main');

// Users...
Route::screen('users/{users}/edit', UserEditScreen::class)->name('platform.systems.users.edit');
Route::screen('users', UserListScreen::class)->name('platform.systems.users');

// Roles...
Route::screen('roles/{roles}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');
Route::screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');
Route::screen('roles', RoleListScreen::class)->name('platform.systems.roles');

// Example...
Route::screen('example', ExampleScreen::class)->name('platform.example');
Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
//Route::screen('/dashboard/screen/idea', 'Idea::class','platform.screens.idea');

use App\Orchid\Screens\EmailSenderScreen;
$this->router->screen('email', EmailSenderScreen::class)->name('platform.email');

use App\Orchid\Screens\CategoriesScreen;
$this->router->screen('categories', CategoriesScreen::class)->name('platform.categories');

use App\Orchid\Screens\CategoryScreen;
$this->router->screen('category/{id}', CategoryScreen::class)->name('platform.category');

use App\Orchid\Screens\ProductsScreen;
$this->router->screen('products', ProductsScreen::class)->name('platform.products');

use App\Orchid\Screens\ProductScreen;
$this->router->screen('product/{id}', ProductScreen::class)->name('platform.product');
