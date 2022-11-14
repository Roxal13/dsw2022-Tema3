<?php
  $link = new mysqli("db", "root", "test", 'world');
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
  <title>Document</title>
</head>
<body>
  <?php
  echo "<h1>Ciudades del país " . $_POST['country'] . "</h1>";
  ?>
  <form action="city_info.php" method="post">
    <select name="city">
  <?php
    $sql = "SELECT city.Name FROM city JOIN country ON city.CountryCode = country.Code WHERE country.Name='" . $_POST["country"] . "'";
    $cities = $link->query($sql);
    $select = $cities->fetch_array();
    while($select != null){
  ?>
      <option><?=$select['Name']?></option>;
  <?php    
      $select = $cities->fetch_array();
    }
    $cities->close();
  ?>
    </select>

    <input type="submit">
  </form>

</body>
</html>
<?php
  $link->close();
?>