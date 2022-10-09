<?php

    require "db.php";
    $sql = "SELECT * FROM tasks WHERE id_tasks = :id ";

    $query = $pdo->prepare($sql);

    $query->execute(array("id"=>$_GET["id"]));

    $task = $query->fetch(PDO::FETCH_ASSOC);

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
        <main class="wrapper" id="special_wrapper">
                <section>
                <h2><?=$task["tasks_name"]?></h2>
                <div class="users">
                    <div>
                        <?php 
                            $sql = "SELECT * FROM users WHERE id_users = $task[tasks_id_userswho]"; 
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $firstU = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>От: <?=$firstU["users_name"]?></p>
                        <p>Почта: <?=$firstU["users_mail"]?></p>
                    </div>
                    <div>
                        <?php 
                            $sql = "SELECT * FROM users WHERE id_users = $task[tasks_id_userswhom]"; 
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $secoundU = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>Кому: <?=$secoundU["users_name"]?></p>
                        <p>Почта: <?=$secoundU["users_mail"]?></p>
                    </div>
                </div>
                <p class="text"><?=$task["tasks_text"]?></p>
                <p>Опубликовано: <time datetime="<?=$task["tasks_dateon"]?>"><?=date("j F Y \г\. \в H:i", strtotime($task["tasks_dateon"]))?></time></p>
                <p>До: <?=$task["tasks_dateoff"]?></p>
                <div>
                    <a type="link" href="del-task.php?id=<?=$task["id_tasks"]?>" class="open">Удалить запись</a>
                    <a type="link" href="upd-task.php?id=<?=$task["id_tasks"]?>" class="open">Редактировать запись</a>
                </div>
            </section>
        </main>
    </body>
</html>

