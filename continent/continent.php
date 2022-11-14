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
  <title>Continent</title>
</head>
<body>
  <h1>Continentes del Mundo</h1>
  <form action="countries.php" method="post">
    <select name="continent">
  <?php
    $sql = "SELECT DISTINCT(Continent) FROM country";
    $continents = $link->query($sql);
    $select = $continents->fetch_array();
    while($select != null){
  ?>
      <option><?=$select['Continent']?></option>;
  <?php    
      $select = $continents->fetch_array();
    }
    $continents->close();
  ?>
    </select>
      
      <input type="submit">
    </form>
</body>
</html>
<?php
  $link->close();
?>