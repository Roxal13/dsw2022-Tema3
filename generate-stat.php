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
    <title>Generate-stat</title>
    <style>
    table {
      border-collapse: collapse;
      text-align: center;
    }

    th {
      background-color: forestgreen;
      border: solid;
      color: white;
    }

    th, td {
      border-style: solid;
      border-width: 1px;
      border-color: forestgreen;
      padding: 2.5px;
    }
    </style>
</head>
<body>
    <h1>Generate stat</h1>
    <table>
    <?php
        $sql = "SELECT * FROM languagestat";
        $result = $link->query($sql);
        $row = $result->fetch_assoc();
        while($row){
            echo "<tr>";
            echo "<td>" . $row['language'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['countries'] . "</td>";
            echo "<td>" . $row['persons'] . "</td>";
            echo "</tr>";
            $row = $result->fetch_assoc();
        }
    ?>
    </table>
    <p><a href="languagestat.php">Mostrar estadísticas</a></p>
</body>
</html>