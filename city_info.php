<?php
    $link = new mysqli('db', 'root', 'test', 'world');
    $error = $link -> connect_errno;
    if ($error != null) {
        echo "<p>El error número: $error</p>";
        echo "<p>El error dice: $link->connect_error </p>";
        die(); //Parar la ejecución;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cities</title>
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
<?php
  echo "<h1>Info de " . $_POST['city'] . "</h1>";
  ?>
  <table>
    <thead>
      <th>id</th>
      <th>Name</th>
      <th>Country</th>
      <th>District</th>
      <th>Population</th>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT * FROM city WHERE Name='" . $_POST["city"] . "'";
      $city = $link->query($sql);

      $row = $city->fetch_array();
    ?>
      <tr>
        <td><?=$row['ID']?></td>
        <td><?=$row['Name']?></td>
        <td><?=$row['CountryCode']?></td>
        <td><?=$row['District']?></td>
        <td><?=$row['Population']?></td>
      </tr>
    <?php
      $city->close();
    ?>
    </tbody>
  </table>
</body>
</html>
<?php
  $link->close();
?>