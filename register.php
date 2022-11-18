<?php
    session_start();
    include("php/des.php");
    include("php/rsa.php");
?>

<html>
    <body>
        <title> Register </title>
        <?php
            // Following https://www.tutorialspoint.com/sqlite/sqlite_php.htm
            class UserDB extends SQLite3 {
                function __construct() {
                    $this->open("database/users.db");
                }
            }

            $users = new UserDB();
            // $users->exec("CREATE TABLE users (
            //     username VARCHAR(255) PRIMARY KEY,
            //     password VARCHAR(255),
            //     email VARCHAR(255),
            //     mobile CHAR(9)
            // );");
            
            $username = $_POST["username"];
            $password = $_POST["hashPass"];
            $email = $_POST["email"];
            $mobile = $_POST["mobile"];
            $des = $_POST["des"];
            $privKey = get_rsa_privatekey("serverKeys/privateKey.txt");
            $decryptedDes = rsa_decryption($des, $privKey);
            $decryptedPassHash = php_des_decryption($decryptedDes,$password);
            $users->exec("INSERT INTO users VALUES ('{$username}','{$$decryptedPassHash}','{$email}','{$mobile}')");
            header("Location: login.html");
        ?>
    </body>
</html>