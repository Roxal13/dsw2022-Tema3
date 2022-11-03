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
  <title>Document</title>
</head>
<body>
  <?php
    if(isset($_POST["submit"])){
      $cod = $_POST["code"];
      $newCod = $_POST["newCode"];
      
      $sql1 = "SELECT DISTINCT(*) FROM country WHERE Code='$cod'";
      $result = $link->query($sql1);
      $select = $result->fetch_array();
      if(strlen($newCod) == 3){
        $sql2 = "INSERT INTO country VALUES('$newCod', '" . $select['Name'] . "', '" . $select['Continent'] . "', '" . $select['Region'] . "', " . $select['SurfaceArea'] . ", " . $select('IndepYear') . ", " . $select['Population'] . ", " . $select['LifeExpectancy'] . ", " . $select['GNP'] . ", " . $select['GNPOId'] . ", '" . $select['LocalName'] . "', '" . $select['GovernmentForm'] . "', '" . $select['HeadOfState'] . "', " . $select['Capital'] . ", " .  $select['Code2'] . ")";
        if(mysqli_commit($link)){
          echo "<p>Las tabla se ha añadido correctamente</p>";
        }else{
          echo "<p>Error en la consulta</p>";
          exit();
        }
      }else{
        echo "<p>Inserte un código válido</p>";
      }
      
    }else{
  ?>
  <h1>Modificar código de País</h1> 
  <form action="modCodigo.php" method="post">
    <label for="code">Code</label>
    <select name="code" id="code">
  <?php
      $sql = "SELECT DISTINCT(country.Code) FROM city JOIN country ON city.CountryCode = country.Code";
      $result = $link->query($sql);
      $select = $result->fetch_array();
      while($select != null){
  ?>
      <option><?=$select['Code']?></option>;
  <?php    
      $select = $result->fetch_array();
      }
      $result->close();
  ?>
    </select>
    <br>
    <label for="newCode">New code</label>
    <input type="text" name="newCode">
    <br>
    <input type="submit" name="submit" value="Modificar">
  </form>
  <?php
    }
  ?>

</body>
</html>
<?php
  $link->close();
?>