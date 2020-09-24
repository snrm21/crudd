<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Categorie</title>
    </head>
<?php



$conexion=mysqli_connect("localhost","root","","movies");
 $consult = "SELECT * FROM statuses";
 $result = mysqli_query($conexion,$consult);
 $fila = $result->fetch_object();

?>
 <body>
        <?php
        $Id=$_GET['id'];
        $sqlEdit= "SELECT * FROM categories WHERE id='".$Id."'";
        $resultEdit=mysqli_query($conexion,$sqlEdit);
    
        while ($fila=mysqli_fetch_assoc($resultEdit)) {
        
            ?>
         <div>
            <form>
                <input type="hidden" name="txtId" value="<?php echo $fila['id'];?>">
                <label>Name Categorie: </label><br>
                <input type="text" name="txtName"value="<?php echo $fila['name'];?>"><br>
                <label>Statues : </label>
                <select name="status"><br>

                    <?php

                    while($fila=mysqli_fetch_assoc($result)){
                    ?>
                    <option value=<?php echo $fila['id']?>><?php echo $fila ['name']?></option> 


                    <?php } ?>

                </select>

                <input type="submit"name="btn"value="Edit">

            <?php
        }
            ?>
             </form>
        </div>
        <?php

        $name=null;
        $status_id=null;
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
        $Updated=date("Y-m-d H:i:s");  
        
        

        if ($name!=null|| $status_id!=null ) {

        $consultEdit = "UPDATE categories set name='".$name."', status_id='".$status_id."',updated_at='".$Updated."' WHERE id='".$idp."'";
            echo $consultEdit;

        mysqli_query($conexion,$consultEdit);
       

        if ($name=1) {

        header("location:addCategories.php"); 
         }

        }


        ?>

    </body>
</html>


