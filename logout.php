<?php
    session_start();
     // destruir a session
     session_destroy();
     // redirecionar para login
     header('location: login.php');
     exit;