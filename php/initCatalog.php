<!-- FILE FOR INITIALIZING EMPTY CATALOG -->

<html>
    <body>
        <?php
            // Following https://www.php.net/manual/en/sqlite3.open.php
            class CatalogDB extends SQLite3 {
                function __construct() {
                    $this->open("database/catalog.db");
                }
            }

            $catalog = new CatalogDB();
            $catalog->exec("CREATE TABLE catalog (
                item_id INTEGER(2147483647) PRIMARY KEY,
                image VARCHAR(255),
                desc VARCHAR(255),
                price DECIMAL(10,2)
            );");

            $catalog->exec("INSERT INTO catalog VALUES(1,'1.jpg','some cacti',0.05);");
            $catalog->exec("INSERT INTO catalog VALUES(2,'2.jpg','5 succulents',0.01);");
            $catalog->exec("INSERT INTO catalog VALUES(3,'3.jpg','desk plants',0.10);");
            $catalog->exec("INSERT INTO catalog VALUES(4,'4.jpg','random indoor plant',10.00);");
            $catalog->exec("INSERT INTO catalog VALUES(5,'5.jpg','cacti for sale',5.00);");
            $catalog->exec("INSERT INTO catalog VALUES(6,'6.jpg','indoor plant',13.00);");
            $catalog->exec("INSERT INTO catalog VALUES(7,'7.jpg','indoor plants',2.00);");
            $catalog->exec("INSERT INTO catalog VALUES(8,'8.jpg','assorted pot plants',1.00);");
            $catalog->exec("INSERT INTO catalog VALUES(9,'9.jpg','indoor plants for desks and tables',1.00);");
            $catalog->exec("INSERT INTO catalog VALUES(10,'10.jpg','cacti',0.50);");
            $catalog->exec("INSERT INTO catalog VALUES(11,'11.jpg','cacti for your window sill',0.20);");
            $catalog->exec("INSERT INTO catalog VALUES(12,'12.jpg','indoor plants to liven up your room',1.50);");
            $catalog->exec("INSERT INTO catalog VALUES(13,'13.jpg','indoor plants',2.00);");
            $catalog->exec("INSERT INTO catalog VALUES(14,'14.jpg','assorted plants',0.75);");
            $catalog->exec("INSERT INTO catalog VALUES(15,'15.jpg','succulent sets easy to maintain',0.10);");
            $catalog->exec("INSERT INTO catalog VALUES(16,'16.jpg','house plants',0.05);");
            $catalog->exec("INSERT INTO catalog VALUES(17,'17.jpg','indoor plants for anyone',0.20);");
            $catalog->exec("INSERT INTO catalog VALUES(18,'18.jpg','easy to care for succulents',0.30);");
            $catalog->exec("INSERT INTO catalog VALUES(19,'19.jpg','small cacti',0.50);");
            $catalog->exec("INSERT INTO catalog VALUES(20,'20.jpg','indoor plants and succulents',0.10);");
        ?>
    </body>
</html>