<p>Список всех товаров</p>
@foreach ($products as $product)
    <ul class="adm_categories">
        <li class="adm_categories-item">
            <a href="/dashboard/product/{{$product->id}}" class="adm_categories-link">{{$product->name}}</a>
        </li>
    </ul>
@endforeach
