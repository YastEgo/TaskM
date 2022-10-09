<?php
    //Подключение файла с конфигурацией
    require "db.php";
    //Описание SQL-запроса на выборку
    $sql = "SELECT * FROM tasks ORDER BY tasks_dateon DESC";
    //Подготовка запроса
    $query = $pdo->prepare($sql);
    //Выполнение запроса
    $query->execute();
    //Преобразование результата в ассоциативный массив
    $tasks = $query->fetchAll(PDO::FETCH_ASSOC);
    //Описание SQL-запроса на выборку
?>
<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/task.css">
        <title>Задания</title>
    </head>
    <body>
        <main class="wrapper">
            <?php foreach($tasks as $item): ?>
                <section>
                <h2><?=$item["tasks_name"]?></h2>
                <div class="users">
                    <div>
                        <?php 
                            $sql = "SELECT * FROM users WHERE id_users = $item[tasks_id_userswho]"; 
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $firstU = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>От: <?=$firstU["users_name"]?></p>
                        <p>Почта: <?=$firstU["users_mail"]?></p>
                    </div>
                    <div>
                        <?php 
                            $sql = "SELECT * FROM users WHERE id_users = $item[tasks_id_userswhom]"; 
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $secoundU = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>Кому: <?=$secoundU["users_name"]?></p>
                        <p>Почта: <?=$secoundU["users_mail"]?></p>
                    </div>
                </div>
                <p class="text"><?=$item["tasks_text"]?></p>
                <p>Опубликовано: <time datetime="<?=$item["tasks_dateon"]?>"><?=date("j F Y \г\. \в H:i", strtotime($item["tasks_dateon"]))?></time></p>
                <p>До: <?=$item["tasks_dateoff"]?></p>
                <a type="link" href="task.php?id=<?=$item["id_tasks"]?>" class="open">Открыть запись</a>
            </section>
            <?php endforeach;?>
            <section id="add-task">
                <a href="add-task.php">
                    <div id="d1">
                        <div id="d2"></div>
                        <div id="d3"></div>
                    </div>
                </a>
            </section>
        </main>
    </body>
</html>

