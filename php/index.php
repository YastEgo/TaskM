<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../styles/style.css">
        <title>TaskMessenger</title>
    </head>
    <body>
        <main class="wrapper">
            <?php
                if (isset($_COOKIE['Cuser']) == false):
            ?>
            <section class="FAQ"> <!-- форма для входа -->
            <h1>Для того, чтобы продолжить, необходимо войти в систему</h1>
                <form action="vhod.php" method="post">
                    <div class="inputs">
                        <?php 
                            session_start();
                            if (isset($_SESSION['warning'])):
                        ?>
                        <p class="warning"><?php  echo $_SESSION['warning'];?> </p>   
                        <?php endif; ?>    
                        <input type="text" name="Email" placeholder="Email" class="Email" required>
                        <input type="password" name="password" placeholder="Пароль" class="Password" required>
                    </div>
                    <div class="buttons">
                        <input type="submit" class="button" value="Войти">
                        <a href="registration.php">Регистрация</a>
                    </div>
                </form>
            </section>   
            <?php 
                else:
            ?>
            <section class="pre-hello">
                <p class="hello">Привет, <?=$_COOKIE['Cuser']?>. Чтобы выйти нажмите <a href="exit.php">Выход.</a><br><a href="tasks.php">Задания</a></p>
            </section>
            <?php 
                endif;
            ?>
        </main> 
    </body>
</html>