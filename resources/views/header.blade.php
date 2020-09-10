<div class="header">
	<div class="header__top">
		<div class="container">
			<div class="header__top-block">
				<div class="header__left">
					<i class="fa fa-truck" aria-hidden="true"></i>
					<a href="">Доставка по г. Хабаровск = 0 руб.</a>
				</div>
				<div class="header__right">
					<a href="">Избранное</a>
					<a href="">Сравнение</a>
					<a href="">Войти</a>
				</div>
			</div>
		</div>
	</div>
	<div class="header__midle">
		<div class="container">
			<div class="header__midle-block">
				<div class="logo">
					<a href="/"><img src="/images/logo.png"></a>
				</div>
				<div class="header__midle-search">
					<input type="input" class="inp-search" name="search" placeholder="Начните вводить название товара">
					<button class="btn-search">Искать</button>
				</div>
				<div class="header__midle-tel">
					<a href="" class="header__midle-tel-call">89098516757</a>
					<a href="" class="header__midle-tel-order-call">заказать звонок</a>
				</div>
				<div class="header__midle-cart-block">
					<div class="cart-block">
						<div class="cart-block-left">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<span class="cart-block-left-count">0</span>
						</div>
						<div class="cart-block-right">
							<span>5000 руб.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header__bottom">
		<div class="container">
			<ul class="header__menu">
				<li class="header__menu-item catalog">
					<a href="" class="header__menu-link catalog">Каталог товаров</a>
					<ul class="sub-menu">
						@foreach ($catalog as $catalog_item)
						<li>
							<a href="/category/{{$catalog_item->id}}">{{$catalog_item->name}}</a>
						</li>
						@endforeach
					</ul>
				</li>
					@foreach ($page as $page_item)
				<li class="header__menu-item">
					<a href="/page/{{$page_item->url}}" class="header__menu-link">{{$page_item->title}}</a>
				</li>
					@endforeach
			</ul>
		</div>
	</div>	
</div>


<script type="text/javascript">
	$(".header__menu-item.catalog").hover(function(){
	    $(".sub-menu").toggle(300);
	})
</script>