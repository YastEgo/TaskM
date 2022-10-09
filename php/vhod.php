<?php
    session_start();
    if(isset($_POST["Email"]) && isset($_POST["password"])) {
        require "db.php";
        $sql = "SELECT * FROM users WHERE users_mail = :Email AND users_password = :password";
        $query = $pdo->prepare($sql);
        $query->execute(array(
            "Email" => $_POST["Email"],
            "password" => $_POST['password']
        ));
        //Для проверки успешности авторизации производится
        //подсчёт количество строк из переменной $sql.
        if($query->rowCount() == 1) {
            /*  Если количество строк — 1 (иначе невозможно),
                то выполняются действия для успешного входа.
            */
            $user = $query->fetch(PDO::FETCH_ASSOC);
            setcookie('Cuser', $user['users_name'], time() + 3600, "/"); //( название COOKIE, данные, время)
            setcookie('ID', $user['id_users'], time() + 3600, "/"); //( название COOKIE, данные, время)
            header("Location: tasks.php");
            $_SESSION['warning'] = '';
        }
        else {
            //Если логин и пароль не совпадают, повторно вызывается форма... =>
            //=> ...и выводится сообщение о неправильном вводе данных:
            $_SESSION['warning'] = 'Имя пользователя или пароль указаны неверно.';
            header("Location: index.php");
            exit();
        }
    }
?>