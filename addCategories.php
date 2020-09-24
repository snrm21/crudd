<?php
$conexion=mysqli_connect("localhost","root","","movies");
$consult1 = "SELECT * FROM categories";
$consult2="SELECT * FROM statuses";
$result = mysqli_query($conexion,$consult1);
$result2 = mysqli_query($conexion,$consult2)
?>
<?php

$name=$_GET['txtName'];
$status_id=$_GET['status'];

if ( isset($_GET['txtId']) ) {
    $idp=$_GET['txtId'];
}
if(isset($_GET['txtName'])){
    $name=$_GET['txtName'];
}
if(isset ($_GET['status'])){
    $status_id=$_GET['status'];
}            

$Created=date("Y-m-d H:i:s");     

if ($name!=null||$Description!=null||$status_id!=null ) {

$consult = "INSERT INTO  categories (name, status_id , created_at) values ('".$name."','".$status_id."','".$Created."')"; 
// echo $consult;
mysqli_query($conexion,$consult);

if ($name=1) {

header("location:admi.php");        }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADD CATEGORIES</title>
    </head>
    <body>

        <form>
            <label>Name Categorie: </label><br>
            <input type="text" name="txtName"><br>
            <label>Statues : </label>
            <select name="status"><br>

                <?php

                while($filaC=mysqli_fetch_assoc($result2)){
                ?>
                <option value=<?php echo $filaC['id']?>><?php echo $filaC ['name']?></option> 


                <?php } ?>

            </select>
            <input type="submit"name="btn"value="Add">
        </form>
    </div>
    <div>
            <a href="add.php">NEW </a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>STATUS</th>
                        <th>CREATE</th>
                        <th>UPDATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
        
                <?php while($fila=mysqli_fetch_assoc($result)){
                
                ?>
                    <tr>
                        <td><?php echo $fila ['id'];?></td>
                        <td><?php echo $fila ['name'];?></td>
                        <td><?php echo $fila ['status_id'];?></td>
                        <td><?php echo $fila ['created_at'];?></td>
                        <td><?php echo $fila ['updated_at'];?></td>
                        <td>
                                <a href="editCategorie.php?id=<?php echo $fila['id']?>">UPDATE</a>
                                <a href="deleteCategorie.php?id=<?php echo $fila['id']?>">DELETE</a>
                </td>
                        <?php  } ?>
                </tr>
                </tbody>

                </table>
                </div>
