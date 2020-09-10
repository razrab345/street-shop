<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use AsSource;

    protected $table = 'ss_categories';

    protected $fillable = [
    	'parent_id',
        'name',
        'description',
        'url',
        'img',
        'meta_key',
        'meta_description',
        'author'
    ];
}
