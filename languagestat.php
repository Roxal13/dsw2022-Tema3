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
    <h1>Language stats</h1>
    <?php
        $stmt = $link->prepare("INSERT INTO languagestat (language, date) VALUES (?,?)";
        $stmt->bind_param("ss", $language, $date);

        $sql = "SELECT DISTINCT(language) FROM countrylanguage";
        $result = $link->query($sql);
        $row = $result->fetch_assoc();
        while($row){
            $language = $row["language"];
            echo "<p>$language</p>";
            $date = date("Y-m-d");
            $stmt->execute();
            $row = $result->fetch_assoc();
        }
    ?>
</body>
</html>