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
</div>
<div id="add-goods" class="box-content h-36 w-1/4 ml-10">
    <h3>Добавление новых товаров</h3>
    <form id="add-goods" method="POST">
        <div>
        <label for="good-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Наименование товара</label>
        <input type="text" id="good-name" name="good-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        </div>
        <label for="good-desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Описание товара</label>
        <input type="text" id="good-desc" name="good-desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        <label for="good-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Стоимость товара</label>
        <input type="text" id="good-price" name="good-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
        <label for="available">Доступность покупателям</label>
        <input type="checkbox" id="available" name="good-availability" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"><br>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить</button>
    </form>
</div>

<script>

</script>
</body>
</html>
