<?php
// session_start();
// include 'connect123.php';

// if (!$conn) {
//     die("Kết nối thất bại");
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
        }
        

        .product-item {
            width: 355px;
            height: auto;
            
            border: 1px solid gray;
            padding: 5px;
            margin-left: 10px;
            float: left;
        }
        .product-item:hover{
            background-color: darkgrey;
           
        }

        .product-item img {
            width: 340px;
            height: 250px;


        }

        .product-item img:hover {
            transform: scale(1.03);
        }

        h3 {
            text-align: center;
            color: blue;
        }

        h3:hover {
            color: pink;
        }

        button {
            
            background-color: red;
            color: white;
            width: 80px;
            height: 30px;
        }

        button:hover {
            background-color: green;
        }
        .product-xemchitiet{
            width: 80px;
            position: relative;
            left: 260px;
        }
        button{
            border-radius: 10px;
        }
    </style>
</head>

<body>
    




<?php
include('connect.php');
$products=mysqli_query($conn,"SELECT *from tours ORDER BY tour_id ASC");



?>

    <div class="container">
        <h1>Danh sách các địa điểm tại miền Bắc </h1>
        <div class="product-items">
            <?php while($row=mysqli_fetch_array($products)) {
        
                ?>    
            <div class="product-item">
                <div class="product-img">
                    <img src="<?=$row['img']?>" alt="" title="ảnh">
                </div>
                <div class="product-name">
                    <h3><?=$row['tour_name']?></h3>

                </div>
                <div class="product-mota"><b><?=$row['mota']?></b></div>
                <div class="product-price">
                    <label for="">Giá: </label>
                    <?=number_format($row['price'],0,",",".")?>đ
                </div>
                <div class="product-time">
                    <label for="">Thời gian:</label>
                    <?=$row['thoigian']?>
                </div>
                <div class="product-khachsan">
                    <label for="">Khách sạn:</label>5*
                </div>
                <div class="product-xemchitiet"> 
                    <button>Đặt Tour</button>

                </div>

            </div>
            <?php  } ?>


        </div>




    </div>



</body>

</html>