<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf" content="{{ csrf_token() }}">
        <title>board</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <ul class="flex">
        <li class="mr-3">
            <a class="inline-block border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white" href="#">Home</a>
        </li>
        <li class="mr-3">
            <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3"
               href="/logout">Logout</a>
        </li>
    </ul>
    <p>boardS</p>
    <div>

    </div>
    <script>

    </script>
    </body>
</html>
