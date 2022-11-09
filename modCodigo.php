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
      
      $sql = "SELECT * FROM country WHERE Code='$cod'";
      $result = $link->query($sql);
      $select = $result->fetch_array();
      if(strlen($newCod) == 3){
        $name = $select["Name"];
        $continent = $select["Continent"];
        $region = $select["Region"];
        $surfArea = $select["SurfaceArea"];
        if($select["IndepYear"] === null ){
          $year = "null";
        }else{
          $year = $select["IndepYear"];
        }
        $population = $select["Population"];
        if($select["LifeExpectancy"] === null ){
          $lifeExpec = "null";
        }else{
          $lifeExpec = $select["LifeExpectancy"];
        }
        $gnp = $select["GNP"];
        if($select["GNPOld"] === null ){
          $gnpoLd = "null" ;
        }else{
          $gnpoLd = $select["GNPOld"] ;
        }
        $localName = $select["LocalName"];
        $government = $select["GovernmentForm"];
        $headOfState = $select["HeadOfState"];
        $capital = $select["Capital"];
        $code2 = $select["Code2"];
        $insert = "INSERT INTO country VALUES('$newCod', '$name', '$continent', '$region', $surfArea, $year, $population, $lifeExpec, $gnp, 
          $gnpoLd, '$localName', '$government', '$headOfState', $capital, '$code2')";
        if($link->query($insert)){
          echo "<p>Las tabla se ha añadido correctamente</p>";
          $link->commit();
        }else{
          echo "<p>El error número: $error</p>";
          echo "<p>El error dice: $link->connect_error </p>";
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
      $sql = "SELECT DISTINCT(country.Code) FROM country";
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