<?php
    session_start();
    file_put_contents('../Student/Unity_PHP/session_data.php', '');
    session_destroy();
    header("Location: ../index.php");
?>