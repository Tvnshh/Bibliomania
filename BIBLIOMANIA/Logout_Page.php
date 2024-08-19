<?php
    session_start();
    session_destroy();
    file_put_contents('Student/Unity_PHP/session_data.php', '');
    header("Location: index.php");
?>