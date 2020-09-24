<?php
$conexion=mysqli_connect("localhost","root","","movies");
$consult1 = "SELECT * FROM users";
$consult3="SELECT * FROM statuses";
$result = mysqli_query($conexion,$consult1);
$result1 = mysqli_query($conexion,$consult3);
$fila = $result->fetch_object();

?>
<?php
  $name=null;
  $Description=null;
  $user_id=null;
  $status_id=null;
  if ( isset($_GET['txtId']) ) {
      $idp=$_GET['txtId'];
  }
  if(isset($_GET['txtName'])){
      $name=$_GET['txtName'];
  }
  if(isset($_GET['txtDescription'])){
  $Description=$_GET['txtDescription'];
  }
  if(isset ($_GET['users'])){
  $user_id=$_GET['users'];
  }
  if(isset ($_GET['status'])){
      $status_id=$_GET['status'];
  }            

  $Created=date("Y-m-d H:i:s");  

  
  if ($name!=null||$Description!=null|| $user_id!=null || $status_id!=null ) {
  
  


$consult = "INSERT INTO  movies (name,description,user_id, status_id , created_at) values ('".$name."','".$Description."','".$user_id."','".$status_id."','".$Created."')"; 
// echo $consult;
mysqli_query($conexion,$consult);

if ($name=1) {

header("location:movies.php");        }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADD</title>
    </head>
    <body>

        <form>
            <label>Name Movie: </label><br>
            <input type="text" name="txtName"><br>
            <label>Description Movie: </label>
            <input type="text" name="txtDescription">
            <label>Statues : </label>
            <select name="status"><br>

                <?php

                while($fila2=mysqli_fetch_assoc($result1)){
                ?>
                <option value=<?php echo $fila2['id']?>><?php echo $fila2 ['name']?></option> 


                <?php } ?>

            </select>

            <label>Users: </label><br>
            <select name="users">

                <?php

                while($fila=mysqli_fetch_assoc($result)){
                ?>
                <option value=<?php echo $fila['id']?>><?php echo $fila ['name']?></option> 


                <?php } ?>
            </select>
            <input type="submit"name="btn"value="Add">
        </form>
    </div>

</body>
</html>
