<?php
    require "db.php";

    $sql = "SELECT * FROM users ORDER BY users_name";

    $query = $pdo->prepare($sql);

    $query->execute();

    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["list_mail"]) && isset($_POST["TXT"]) && isset($_POST["Task_name"]) && isset($_POST["Dateoff"])):
        //Объявление запроса с маркерами
        $sql = "INSERT INTO tasks (tasks_name, tasks_text, tasks_id_userswho ,tasks_id_userswhom, tasks_dateoff) VALUES (:Task_name, :TXT, :firstID, :secoundID, :dateoff)";
        $query = $pdo->prepare($sql);
        foreach($users as $item):
            if ($_POST["list_mail"] == $item["users_mail"]){
                $secoundID = $item["id_users"];
            }
        endforeach;
        //Назначение маркеров
        $query->execute(array(
            "Task_name" => $_POST["Task_name"],
            "TXT" => $_POST["TXT"],
            "firstID" => $_COOKIE["ID"],
            "secoundID" => $secoundID,
            "dateoff" =>$_POST["Dateoff"]
        ));
        //Переадрессация по завершению
    endif;
    header("Location: tasks.php");

?>

