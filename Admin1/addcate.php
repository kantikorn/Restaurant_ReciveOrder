<?php
include "../system/api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มหมวดหมู่อาหาร</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:rgb(9, 16, 68); font-weight: bolder;">Add Category</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navindex">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="ManageRestaurant.php">HOME</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-3">
        <div class="row">
            
        </div>
    </div>




    <div class="container-fluid mt-5">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card" style="width: 100%; background-color: rgb(255, 239, 212);">
                    <form action="addcate.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3 mt-3">
                            <label for="imgcate" class="form-label">Image Category</label>
                            <input type="file" class="form-control" id="imgcate" name="imgcate" >
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Catename" class="form-label">Categoryname</label>
                            <input class="form-control" id="Catename" name="Catename" placeholder="กรอกชื่อประเภทอาหาร....">
                        </div>


                       
                            <button class="btn btn-success mt-2 mb-2" type="submit" name="add-cate">Confirm</button>
                            <button class="btn btn-danger mt-2 mb-2" type="button">Cancle</button>
                      
                    </form>
                    <?php
                    if(isset($_POST['add-cate'])) {
                        $id = $_SESSION['user_id'];
                        $img = $_FILES['imgcate']['name'];
                        $content = file_get_contents($_FILES['imgcate']['tmp_name']);
                        $name = $_POST['Catename'];
                        $base64 = 'data:image/png;base64,' . base64_encode($content);
                        $sql = "INSERT INTO `category`(`cate_id`, `name`, `user_id`, `image`) VALUES (NULL,'$name','$id','$base64')";
                        $conn -> query($sql);
                    }
                    ?>
                </div>
            </div>

            <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `category` WHERE `user_id`='$id'";
            if ($result = $conn -> query($sql)) {
                while($row = $result -> fetch_assoc()) {
                    echo '
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                    <div class="card" style="width: 100%;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 mb-3 mt-3">
                                    <img src="'.$row['image'].'" style="width: 100%; height: 120px; border-radius: 10px;">
                                </div>
                                <div class="col-sm-6 mb-3 mt-3">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <hr>
                                    <a class="btn btn-outline-primary" type="button" href="addmenu.html">เพิ่มเมนู +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                }
            }
            
            ?>
     </div>
    </div>



   







    
</body>
</html>