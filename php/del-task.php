<?php
    require "db.php";

    $sql = "DELETE FROM tasks WHERE id_tasks = :id";
    $query = $pdo->prepare($sql);
    $query->execute(array("id"=>$_GET["id"]));

    header("Location: tasks.php");
?>

