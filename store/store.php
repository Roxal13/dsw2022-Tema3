<?php include("includes/header.php"); ?>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
            </tr>
        </thead>
        <tbody> 
            <?php
                include("includes/conexion.php");
                $sql = "SELECT * FROM stores";
                $result = $link->query($sql);
                while($row = $result->fetch()){
                    printf("<tr><td>%s</td><td>%s</td></tr>",$row['id'],$row['name']);
                }
            ?>
        </tbody>
    </table>
</body>
</html>