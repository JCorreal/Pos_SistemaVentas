<?php
     session_destroy();
     unset($_SESSION['User_Name']);
     header('location: ../Vistas/index.php');
     exit();
