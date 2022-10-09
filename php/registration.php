<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../styles/style.css">
        <title>Регистрация</title>
    </head>
    <body>
        <main class="wrapper"> <!-- Основаня часть страницы -->
            <section class="FAQ"> <!-- форма с регистрацией -->
                <form action="reg.php" method="post">
                    <div class="inputs">
                        <input type="email" name="Email" placeholder="Email" class="Password" required>
                        <input type="text" name="Name" placeholder="Имя" class="Email" required>
                        <input type="password" name="password" placeholder="Пароль" class="Password" required>
                    </div>
                    <div class="buttons">
                        <input type="submit" class="button registration" value="Зарегистрироваться">
                    </div>
                </form>
            </section>        
        </main>
    </body>
</html>