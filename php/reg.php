<?php 
    if(isset($_POST["Email"]) && isset($_POST["Name"]) && isset($_POST["password"])):
        require "db.php";
        //Объявление запроса с маркерами
        $sql = "INSERT INTO users (users_mail, users_name, users_password) VALUES (:Email, :Name, :password)";
        $query = $pdo->prepare($sql);
        //Назначение маркеров
        $query->execute(array(
            "Email" => $_POST["Email"],
            "Name" => $_POST["Name"],
            "password" => $_POST["password"]
        ));
        //Переадрессация по завершению
        header("Location: index.php");
    else: 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Что-то пошло не так</title>
</head>
<body>
    <main>
        <h1>Что то пошло не так, проверьте, заполнены ли все поля ввода</h1>
    </main>
</body>
</html>
<?php endif; ?>