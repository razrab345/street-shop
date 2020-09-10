<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Brands extends Model
{
    use AsSource;

    protected $table = 'ss_brands';

    protected $fillable = [
    	'category_id',
        'name',
        'description',
        'url',
        'img',
        'meta_key',
        'meta_description',
        'author'
    ];

    public function products(){
        return $this->hasMany('App\Products', 'brand_id');
    }
}
