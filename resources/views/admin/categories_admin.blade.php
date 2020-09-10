<p>Список всех категорий</p>
@foreach ($categories as $category)
    <ul class="adm_categories">
        <li class="adm_categories-item">
            <a href="/dashboard/category/{{$category->id}}" class="adm_categories-link">{{$category->name}}</a>
        </li>
    </ul>
@endforeach
