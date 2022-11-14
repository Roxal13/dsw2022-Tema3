<?php 
if(isset($_POST["create"])) {
    $name = $_POST["name"];
    include("includes/connection.php");
    
    try {
        $sql = "INSERT INTO stores VALUES(null, '$name')";
        $link->exec($sql);
        
    } catch(PDOException $ex){
        die("Error al crear" . $ex->getMessage());
    }
}
?>
<?php include("includes/disconnect.php"); ?>
<?php header('Location: store.php'); ?>