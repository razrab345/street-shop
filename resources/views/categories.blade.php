@extends('layout')

@section('content')
	<p>Список всех категорий</p>
    @foreach ($catalog as $catalog_item)
        <li>
            <a href="/category/{{$catalog_item->id}}">{{$catalog_item->name}}</a>
        </li>
    @endforeach
@endsection
