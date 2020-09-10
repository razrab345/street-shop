<p>ID Продукта: {{$product_id}}</p>
<div class="adm_category">
    <ul class="adm_nav-tabs">
        <li class="adm_nav-tabs-item active">
            <a class="tab-general">Общие</a>
        </li>
        <li class="adm_nav-tabs-item">
            <a class="tab-desk-meta">Описание и Мета-теги</a>
        </li>
        <li class="adm_nav-tabs-item">
            <a class="tab-desk-img">Изображения</a>
        </li>
        <li class="adm_nav-tabs-item">
            <a class="tab-desk-options">Прочее</a>
        </li>
    </ul>
    <label>Название товара:</label>
    <input type="text" value="{{$product_name}}" name="new_title" class="adm_inp">
    <label>Цена:</label>
    <input type="text" value="{{$product_price}}" name="new_price" class="adm_inp">
    <label>Количество:</label>
    <input type="text" value="{{$product_quantity}}" name="new_quantity" class="adm_inp">
    <label>Описание:</label>
    <textarea rows="10" cols="45" name="new_desc" class="adm_category-desc">{{$product_description}}</textarea>
</div>


