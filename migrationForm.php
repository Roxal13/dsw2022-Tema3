<?php
    $link = new mysqli("db", "root", "test", 'world');
    $error = $link -> connect_errno;
      if ($error != null) {
          echo "<p>El error número: $error</p>";
          echo "<p>El error dice: $link->connect_error </p>";
          die(); //Parar la ejecución;
      }
      mysqli_autocommit($link, FALSE);

      $origin = $_POST["origin"];
      $destination = $_POST["destination"];
      $number = $_POST["number"];
      if($origin == $destination){
        echo "<p>Elija dos países diferentes</p>";
      }else{
        $sql1 = "UPDATE country SET Population = Population - $number WHERE Code='$origin'";
        $sql2 = "UPDATE country SET Population = Population + $number WHERE Code='$destination'";
        if($link->query($sql1) && $link->query($sql2)){
            echo "Se han actualizado las tablas correctamente";
            $link->commit();
        }else{
            echo "<p>El error número: $error</p>";
            echo "<p>El error dice: $link->connect_error </p>";
            $link->rollback();
            exit();
        }
        
      }
      $link->close();
?>