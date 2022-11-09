<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;;
            border-style: solid;
            border-width: 1px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>precio</th>
                <th>stock</th>
                <th>id tienda</th>
            </tr>
        </thead>
        <tbody> 
            <?php
                $host = "db";
                $user = "root";
                $password = "test";
                $db = "storeDB";

                $dsn = "mysql:host=$host; dbname=$db";

                $link = new PDO($dsn, $user, $password);

                $sql = "SELECT * FROM products LIMIT 20";
                $result = $link->query($sql);
                
                $result->bindColumn('id', $id);
                $result->bindColumn('name', $name);
                $result->bindColumn('price', $price);
                $result->bindColumn('stock', $stock);
                $result->bindColumn('id_store', $id_store);

                while ($result->fetch(PDO::FETCH_BOUND)) {
                    echo "<tr><td>$id</td><td>$name</td><td>$price</td><td>$stock</td><td>$id_store</td></tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>