<?php include("includes/header.php"); ?>
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
                include("includes/conexion.php");
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