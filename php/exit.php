<?php
    setcookie('Cuser', $user['users_name'], time() - 3600, "/"); //( название COOKIE, данные, время)
    setcookie('ID', $user['id_users'], time() - 3600, "/"); //( название COOKIE, данные, время) 
    header("Location: index.php");
?>