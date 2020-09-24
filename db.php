<?php
        $email = $_POST['email'];
        $password = $_POST['password'];
   

    //conectar bd
    $conexion=mysqli_connect("localhost","root","","movies");
    $consult="SELECT * FROM users WHERE email='$email'and password='$password' ";
    $result = mysqli_query($conexion,$consult);

    $row = mysqli_num_rows($result);
    $fila = $result->fetch_object();
    $fila=$role_id;
   
    if ($row>0){
        session_start();
        $_SESSION['email']=$email;
            if ($fila->role_id==1){
                header("location:admi.php");
            }
            if($fila->role_id==2){
                header("location:register.php");
            }
            if ($fila->role_id==3){
                header("location:client.php");
            }
            



  
    }else{
        echo "Usuario no encontrado";
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
?>
