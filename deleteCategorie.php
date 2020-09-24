<?php
 $conexion=mysqli_connect("localhost","root","","movies");
  $id=$_GET['id'];
  $sql="DELETE FROM categories WHERE id='".$id."'";
    mysqli_query($conexion,$sql);
    header('location : categories.php');
?>