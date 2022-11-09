<?php
  $link = new mysqli("db", "root", "test", 'world');
  $error = $link -> connect_errno;
    if ($error != null) {
        echo "<p>El error número: $error</p>";
        echo "<p>El error dice: $link->connect_error </p>";
        die(); //Parar la ejecución;
    }
    mysqli_autocommit($link, FALSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migration</title>
</head>
<body>
    <h1>Migración</h1>
    <form action="migrationForm.php" method="post">
        Origen: <select name="origin">
        <?php
            $sql = "SELECT Name, Code FROM country";
            $result = $link->query($sql);
            $select = $result->fetch_array();
            while($select != null){
        ?>
                <option value="<?=$select['Code']?>"><?=$select['Name']?></option>;
        <?php
                $select = $result->fetch_array();
            }
        ?>
        </select>
        <br>
        Destino: <select name="destination">
        <?php
            $result = $link->query($sql);
            $select = $result->fetch_array();
            while($select != null){
        ?>
                <option value="<?=$select['Code']?>"><?=$select['Name']?></option>;
        <?php
                $select = $result->fetch_array();
            }
        ?>
        </select>
        <br>
        Desplazados: <input type="number" name="number">
        <input type="submit">
    </form>
</body>
</html>
<?php
    $link->close();
?>