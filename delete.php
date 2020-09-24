<?php
 $conexion=mysqli_connect("localhost","root","","movies");
  $id=$_GET['id'];
  $sql="DELETE FROM movies WHERE id='".$id."'";
    mysqli_query($conexion,$sql);
    header('location : admi.php');
?>