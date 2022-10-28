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
  echo "<h1>Países del continente " . $_POST['continent'] . "</h1>";
  ?>
  <form action="cities_country.php" method="post">
    <select name="country">
  <?php
    $sql = "SELECT Name FROM country WHERE Continent='" . $_POST["continent"] . "'";
    $countries = $link->query($sql);
    $select = $countries->fetch_array();
    while($select != null){
  ?>
      <option><?=$select['Name']?></option>;
  <?php    
      $select = $countries->fetch_array();
    }
    $countries->close();
  ?>
    </select>
    <input type="submit">
  </form>

</body>
</html>
<?php
  $link->close();
?>