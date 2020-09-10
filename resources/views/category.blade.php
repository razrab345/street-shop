@extends('layout')

@section('content')
<div class="container">
	<div class="navigation">
		<div class="breadcrumbs">
			<a href="/" class="breadcrumb">Главная</a>
			<a href="/categories" class="breadcrumb">Каталог товаров</a>
			<a href="" class="breadcrumb-last">{{$name}}</a>
		</div>
		<h1>{{$name}}</h1>
	</div>
</div>

<div class="container">
	<div class="sorting">
		<div class="sorting__item">
			<a href="" class="sort-popular">По популярности</a>
		</div>
		<div class="sorting__item">
			<a href="" class="sort-alphavit">По алфавиту</a>
		</div>
		<div class="sorting__item">
			<a href="" class="sort-price">По цене</a>
		</div>
	</div>
</div>


<div class="content">
  <div class="container">
  	<div class="content-block">
  		<div class="content__left">
  			<div class="filtr">
  				<form method="GET" action="">
  					<div class="filtr__item">
  						<span class="filter_title">По бренду:</span>
  						@foreach($brands as $brands_item)
  						<label for="brand">
  							<span class="filter_span">{{$brands_item}}</span>
  							<input type="checkbox" name="brand[]" value="{{$brands_item}}" class="filter_inp">
  						</label>
  						@endforeach
  					</div>
  					<div class="filtr__item">
  						<span class="filter_title">По сезону:</span>
  						@foreach($sezon as $sezon_item)
  						<label for="sezon">
  							<span class="filter_span">{{$sezon_item}}</span>
  							<input type="checkbox" name="sezon[]" value="{{$sezon_item}}" class="filter_inp">
  						</label>
  						@endforeach
  					</div>
  					<div class="filtr__item">
  						<span class="filter_title">По материалу:</span>
  						@foreach($material as $material_item)
  						<label for="material">
  							<span class="filter_span">{{$material_item}}</span>
  							<input type="checkbox" name="material[]" value="{{$material_item}}" class="filter_inp">
  						</label>
  						@endforeach
  					</div>
  					<div class="filtr__item">
  						<span class="filter_title">По размеру:</span>
  						<label for="razmer">
  							<span class="filter_span">43</span>
  							<input type="checkbox" name="razmer[]" value="43" class="filter_inp">
  						</label>
  					</div>
  					<input type="submit" name="submit_form" value="Подобрать" id="submit_filter">
  				</form>
  			</div>
  		</div>
  		<div class="content__right">
  			<div class="product-list">
		  	@foreach ($products as $product)
				<div class="product">
					<div class="product__top">
						<img src="/storage/images/{{$product->img}}" class="product__top-img">
					</div>
					<div class="product__info">
						<h2 class="product-name">
							<a href="/product/{{$product->id}}">{{$product->name}}</a>
						</h2>
						<div class="product-price">
							<span class="price">{{$product->price}} руб.</span>
						</div>
						<div class="product-quantity">
							<p>в наличии: </p>
							<span class="quantity"> {{$product->quantity}}</span>
						</div>
            <div class="product-razmer">
              <span class="razmer-title">размеры:</span>
              <span class="razmers">{{$product->razmer}}</span>
            </div>
					</div>
          <div class="product__bottom">
            <button class="product__add-to-cart">Купить</button>
            <button class="product__add-to-like">В избранное</button>
          </div>

				</div>
					@endforeach
		  </div>
  		</div>
  	</div>
  </div>

</div>


  <p>{{$description}}</p>

  <script type="text/javascript">
  let FormatElement = function() {
  let element = $('.razmers');

  function render(data) {
    return data.map(function(v) {
      return `<span class="razmer">${v}</span>`;
    });
  }

  function insertNewElements(element, values) {
    element.html(render(values));
  }

  this.start = function() {
    element.each(function() {
      const _this = $(this);
      const valuesText = _this.text();
      const values = valuesText.split(',');
      insertNewElements(_this, values);
    });
  }

}


const formatElement = new FormatElement();
formatElement.start();
</script>
@endsection




