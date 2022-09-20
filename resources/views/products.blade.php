<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>Управление товарами</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@include('nav')
<h1>Управление товарами</h1>
<div id="current-goods">
    <h3>Текущие доступные товары</h3>
    @foreach($products as $product)
        <p>Наименование продукта: {{ $product->name }} </p>
    @endforeach
</div>
<div id="add-product" class="box-content h-36 w-1/4 ml-10">
    <h3>Добавление новых товаров</h3>
    <form id="add-product-form" method="POST">
        <div id="add-product-response"></div>
        <div id="name-error"></div>
        <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Наименование
            товара</label>
        <input type="text" id="product-name" name="product_name"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        <div id="desc-error"></div>
        <label for="product-desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Описание
            товара</label>
        <input type="text" id="product-desc" name="product_desc"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        <div id="price-error"></div>
        <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Стоимость
            товара</label>
        <input type="text" id="product-price" name="product_price"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        <div id="cat-error"></div>
        <label for="category">Категория:</label>

        <select name="category" id="category">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="available">Доступность покупателям</label>
        <input type="checkbox" id="available" name="product_availability"
               class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"><br>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Добавить
        </button>
    </form>
</div>
<script>
    let form = document.getElementById('add-product-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        let formData = new FormData(form);

        fetch('/addproduct', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
            if (data.errors.product_name){
                document.getElementById('name-error').innerHTML = data.errors.product_name;
            }
            if (data.errors.product_desc){
                document.getElementById('desc-error').innerHTML = data.errors.product_desc;
            }
            if (data.errors.product_price){
                document.getElementById('price-error').innerHTML = data.errors.product_price;
            }
            if (data.errors.category){
                document.getElementById('cat-error').innerHTML = data.errors.category;
            }
        });
    });
</script>
</body>
</html>
