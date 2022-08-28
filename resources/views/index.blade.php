<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf" content="{{ csrf_token() }}">
        <title>Авторизация</title>
    </head>
    <body>
    <p>Авторизация</p>
    <div>
        <div id="base-error"></div>
        <form id="login-form" method="POST" action="/login">
            <p>Логин:</p>
            <label>
                <input type="text" name="login">
            </label>
            <div id="login-error"></div>
            <p>Пароль:</p>
            <label>
                <input type="text" name="password">
            </label>
            <div id="password-error"></div>
            <p><button type="submit">Войти</button></p>
        </form>
    </div>
    <script>
        let form = document.getElementById('login-form');
        form.addEventListener('submit', function (event){
            event.preventDefault();
            let formData = new FormData(form);

            fetch('/login', {
              method: 'POST',
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name=csrf]').getAttribute('content'),
                  'Accept': 'application/json'
              },
              body: formData
            }).then((response) => {
                if(response.status === 200){
                    window.location.replace('/main');
                }
                return response.json();
            }).then((data) => {
                if (data.errors.login){
                    document.getElementById('login-error').innerHTML = data.errors.login;
                }
                if (data.errors.password){
                    document.getElementById('password-error').innerHTML = data.errors.password;
                }
                if (data.errors.base){
                    document.getElementById('base-error').innerHTML = data.errors.base;
                }
            });
        });
    </script>
    </body>
</html>
