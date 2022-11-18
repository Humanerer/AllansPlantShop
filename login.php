<?php
    session_start();
    include("php/des.php");
    include("php/rsa.php");
?>

<html>
    <body>
        <title> Login </title>
        <?php
            //Following https://www.tutorialspoint.com/sqlite/sqlite_php.htm
            class UserDB extends SQLite3 {
                function __construct() {
                    $this->open("database/users.db");
                }
            }

            $users = new UserDB();

            $username = $_POST["username"];
            $password = $_POST["hashPass"];
            $des = $_POST["des"];

            $privKey = get_rsa_privatekey("serverKeys/privateKey.txt");
            $decryptedDes = rsa_decryption($des, $privKey);
            

            $decryptedPassHash = php_des_decryption($decryptedDes,$password);
            // echo $username;
            // echo $password;
            $result = $users->query("SELECT * FROM users WHERE username='{$username}' AND password='{$decryptedPassHash}'");
            if ($result->fetchArray()){ // If a match was found
                $_SESSION["des"] = $decryptedDes;
                // echo "<script> console.log('server: {$_SESSION["des"]}')</script>";
                header("Location: catalog.php");
            } else {
                header("Location: login.html?login=0");
            }
        ?>
    </body>
</html>