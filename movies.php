<?php
  $conexion=mysqli_connect("localhost","root","","movies");
  $consult="SELECT movies.*, users.name as usuario, statuses.name as status
  FROM movies join users join statuses
  where movies.user_id = users.id
  and movies.status_id = statuses.id
  order by movies.id";
  $result = mysqli_query($conexion,$consult);
 
  $row = mysqli_num_rows($result);
  $fila = $result->fetch_object();

          

?>




<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  

    <title>Shahala</title>
</head>


<body>
    <header class="mt-0 pt-0">
        <div class="bg-cover clearfix pt-3">
            <h2 class="logo">NEW MOVIES</h2>


            <input type="text" id="nav-search" class="nav-search mx-auto" name="" class="form-control">
            <div class="ml-0 mr-0 pb-1">
                <nav class="navbar navbar-expand-md">

                    <button class="navbar-toggler ml-auto" data-target="#my-nav" data-toggle="collapse"
                        aria-controls="my-nav" aria-expanded="false" onclick="myFunction(this)"
                        aria-label="Toggle navigation">
                        <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="movies.php">MOVIES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users.php">USERS</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="rentals.php">RENTALS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addCategories.php">CATEGORIES</a>
                            </li>
                            <li class="nav-item">
                                <form action="" method="POST">
                                    <div class="input-group mt-0 mx-auto" style="width:16px;">

                                        <div class="">
                                            <img src="assets/images/search-icon.png" id="toggle-search"
                                                class="ml-2 toggle-search" alt="search icon">
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div>
            <a href="add.php">NEW </a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>USER</th>
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
                        <td><?php echo $fila ['description'];?></td>
                        <td><?php echo $fila ['usuario'];?></td>
                        <td><?php echo $fila ['status'];?></td>
                        <td><?php echo $fila ['created_at'];?></td>
                        <td><?php echo $fila ['updated_at'];?></td>
                        <td>
                                <a href="edit.php?id=<?php echo $fila['id']?>">UPDATE</a>
                                <a href="delete.php?id=<?php echo $fila['id']?>">DELETE</a>
                </td>
                        <?php  } ?>
                </tr>
                </tbody>

                </table>
                </div>
                    </div>
                </body>
        
 