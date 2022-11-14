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
  <title>Country</title>
</head>
<body>
  <h1>Countries</h1>
  <?php
    $code = "";
    if(isset($_GET['code'])){
      $code = $_GET['code'];
      $sql = "SELECT Code, Name, Continent FROM country WHERE Code = '$code'";
      $country = $link->query($sql);
      $list = $country->fetch_array();
      if ($list !== null){
  ?>
  <ul>
    <li>Code: <?=$list['Code']?></li>
    <li>Country: <?=$list['Name']?></li>
    <li>Europa: <?=$list['Continent']?></li>
  </ul>
  <?php
  }else{
        echo "<p>Inserte un código válido</p>";
      }
    }else{
      echo "<p>Inserte un código</p>";
    }
  ?>
  </li>
</body>
</html>