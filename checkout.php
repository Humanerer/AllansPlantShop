<?php
    session_start();
    if(!isset($_SESSION["des"])){
        header("Location: login.html?login=-1");
    }
    include("php/des.php");
?>

<html>
    <body>
        <head>
            <link rel="stylesheet" href="main.css">
        </head>
        <div class="topnav">
            <a href="login.html"> login</a>
            <a href="register.html"> Register</a>
            <a href="catalog.php"> Catalog</a> 
            <a href="logout.php"> Logout </a> 
        </div>
        <title> Checkout </title>
        <h1> Checkout </h1>
        <script src="js/index.js"></script>
        <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
        <?php
            $total = $_POST["postTotal"];
            $total = number_format(php_des_decryption($_SESSION["des"],$total),2);
            echo "Total: \${$total}";
            echo "<script> setTotal({$total}) </script>";
        ?>
        <div id="container"></div>
    </body>
</html>