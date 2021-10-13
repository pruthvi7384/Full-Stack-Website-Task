<?php
    session_start();
    // ===========Include Db Connectiobn File And Site Path File=============
        include '_SitePath.php';
        include '_DbConnection.php';
    // =========X==Include Db Connectiobn File And Site Path File==X===========
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Web Project</title>
    <!-- ---------Font Awsome CDN For Icons-------------- -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- ----X-----Font Awsome CDN For Icons----X-------- -->

    <!-- ----------Google Fonts---------------- -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&display=swap" rel="stylesheet">
    <!-- -------X---Google Fonts------X-------- -->

    <!-- -----------Boostrap CSS CDN------------------- -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- --------X---Boostrap CSS CDN---X---------------- -->

    <!-- ---------External CSS Style Sheet--------- -->
        <link rel="stylesheet" href="<?php echo SITE__PATH; ?>/style/style.css">
    <!-- -----X---External CSS Style Sheet----X---- -->
</head>
<body>
