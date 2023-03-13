<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Restaurant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand mt-3" href="#" style="color:rgb(15, 10, 60); font-weight: bolder;">Welcome Restaurant</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navres">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navres">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary mt-3" type="button" href="addcate.html">เพิ่มหมวดหมู่อาหาร +</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary mt-3" type="button" href="addmenu.html">เพิ่มเมนูอาหาร +</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary mt-3" type="button" href="report.html">สรุปการขายรายวัน</a>
                    </li>

                    <!--เเก้ไขใหม่-->
                    <li class="nav-item mt-3"  style="margin-left: 10px;">
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-danger" type="submit" name="logout">ออกจากระบบ</button>
                        </form>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">ออร์เดอร์ทั้งหมด</h5>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-3">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card" style="width: 100%; ">
                    <div class="card-header" style="background-color: rgb(11, 6, 70);">
                        <h6 class="card-text" style="color: #fff;">โต้ะที่ 7 คุณ กัณติกรณ์</h6>
                    </div>
                    <div class="card-body" style="background-color: rgb(186, 223, 255);">
                        <li style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <li  style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <hr>
                        <h6 class="card-text"  style="color:rgb(8, 1, 72);">ราคารวม: 120 บาท</h6>
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-primary" type="submit" name="recive-order">รับรายการอาหาร</button>
                            <button class="btn btn-success" type="submit" name="complete">ออร์เดอร์เสร็จสิ้น</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card" style="width: 100%; ">
                    <div class="card-header" style="background-color: rgb(11, 6, 70);">
                        <h6 class="card-text" style="color: #fff;">โต้ะที่ 7 คุณ กัณติกรณ์</h6>
                    </div>
                    <div class="card-body" style="background-color: rgb(186, 223, 255);">
                        <li  style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <li  style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <hr>
                        <h6 class="card-text"  style="color:rgb(8, 1, 72);">ราคารวม: 120 บาท</h6>
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-primary" type="submit" name="recive-order">รับรายการอาหาร</button>
                            <button class="btn btn-success" type="submit" name="complete">ออร์เดอร์เสร็จสิ้น</button>
                        </form>
                    </div>
                </div>
            </div>




            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card" style="width: 100%; ">
                    <div class="card-header" style="background-color: rgb(11, 6, 70);">
                        <h6 class="card-text" style="color: #fff;">โต้ะที่ 7 คุณ กัณติกรณ์</h6>
                    </div>
                    <div class="card-body" style="background-color: rgb(186, 223, 255);">
                        <li style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <li  style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <hr>
                        <h6 class="card-text" style="color:rgb(8, 1, 72);">ราคารวม: 120 บาท</h6>
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-primary" type="submit" name="recive-order">รับรายการอาหาร</button>
                            <button class="btn btn-success" type="submit" name="complete">ออร์เดอร์เสร็จสิ้น</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card" style="width: 100%; ">
                    <div class="card-header" style="background-color: rgb(11, 6, 70);">
                        <h6 class="card-text" style="color: #fff;">โต้ะที่ 7 คุณ กัณติกรณ์</h6>
                    </div>
                    <div class="card-body" style="background-color: rgb(186, 223, 255);">
                        <li style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <li style="color:rgb(8, 1, 72);">ข้าวผัดกระเพรา จำนวน 1</li>
                        <hr>
                        <h6 class="card-text"  style="color:rgb(8, 1, 72);">ราคารวม: 120 บาท</h6>
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-primary" type="submit" name="recive-order">รับรายการอาหาร</button>
                            <button class="btn btn-success" type="submit" name="complete">ออร์เดอร์เสร็จสิ้น</button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>




    


  
</body>
</html>