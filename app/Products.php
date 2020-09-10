<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Products extends Model
{
    use AsSource;

    protected $table = 'ss_products';

    protected $fillable = [
        'category_id',
        'name',
        'brand_id',
        'price',
        'quantity',
        'article',
        'sezon',
        'description',
        'razmer',
        'material',
        'url',
        'img',
        'meta_key',
        'meta_description',
        'author'
    ];

    public function brand(){
        return $this->belongsTo('App\Brands');
    }
}
