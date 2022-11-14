<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/menu.php"); ?>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
            </tr>
        </thead>
        <tbody> 
            <?php
                $sql = "SELECT * FROM stores";
                $result = $link->query($sql);
                while($row = $result->fetch()){
                    printf("<tr><td>%s</td><td>%s</td></tr>",$row['id'],$row['name']);
                }
            ?>
        </tbody>
    </table>
<?php include("includes/disconnect.php"); ?>
<?php include("includes/footer.php"); ?>