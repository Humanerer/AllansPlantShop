<?php
    session_start();
    if(!isset($_SESSION["des"])){
        header("Location: login.html?login=-1");
    }
?>

<html>
    <body>
        <head>
            <link rel="stylesheet" href="main.css">
        </head>
        <title> Catalog </title>
        <div class="topnav">
            <a href="login.html"> login</a>
            <a href="register.html"> Register</a>
            <a href="catalog.php"> Catalog</a> 
            <a href="logout.php"> Logout </a> 
        </div>
        <h1> Catalog </h1>
        <script src="js/des.js"></script>
        <script src="js/getCookie.js"></script>
        <script>
            function setTotal(){
                var total = 0;
                var prices = document.getElementsByName("price");
                var quants = document.getElementsByName("quant");
                // console.log(prices);
                // console.log(prices.value);
                for(var x=0; x<prices.length; x++){
                    total += prices[x].value*quants[x].value;
                }
                document.getElementById("total").innerHTML = "Total: $"+total.toFixed(2);
                document.getElementById("postTotal").value = total.toFixed(2);
                document.getElementById("postTotal").value = javascript_des_encryption(getCookie("des"),total.toFixed(2));
                // console.log(document.getElementById("postTotal").value);
                document.getElementById("checkout").disabled = (document.getElementById("postTotal").value == 0.00);
            }
        </script>
        <form action="checkout.php" method="POST" class="catalog">
            <table>
            <tr>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php
                // Following https://www.php.net/manual/en/sqlite3.open.php
                class CatalogDB extends SQLite3 {
                    function __construct() {
                        $this->open("database/catalog.db");
                    }
                }

                $catalog = new CatalogDB();
                $result = $catalog->query("SELECT * FROM catalog");
                while ($row = $result->fetchArray()){
                    $formattedPrice = number_format((float)$row['price'], 2, '.', '');
                    echo "<tr>";
                    echo "<td><img src='images/{$row['image']}' alt='image of item {$row['item_id']}' style='width:100px;height:100px;'></td>";
                    echo "<td>{$row['desc']}</td>";
                    echo "<td>\${$formattedPrice}<input type='hidden' name='price' value='{$formattedPrice}' readonly/></td>";
                    echo "<td><input type='number' value='0' id='{$row['item_id']}q' name='quant' onchange='setTotal()' min='0'/></td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td></td>
                <td><input type="hidden" id="postTotal" name="postTotal" value="0.00"/></td> 
                <td><p id="total" name="total" value="Total: $0.00">Total: $0.00</p></td> 
                <td><input type="submit" id="checkout" value="Checkout" disabled/></td> 
            </tr>
            </table>
        </form>
    </body>
</html>