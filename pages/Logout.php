<?php
    session_start();
    // ===================Condition====================
        if(!isset($_SESSION['IS_LOGIN'])){
            echo "<script>window.location='Login.php'</script>";
        }
    // =================X==Condition===X=================
    unset($_SESSION['IS_LOGIN']);
    echo "<script>window.location='../index.php?type=home'</script>";
    die();
?>