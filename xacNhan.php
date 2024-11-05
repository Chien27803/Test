<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }
        form {
            width: 500px;
            height: auto;
            border: 1px solid black;
            margin: 0 auto;
            padding-left: 20px;
            margin-top: 50px;
            border-radius: 10px;
            background-color:rgb(29, 188, 255);
           
            
        }
        h2{
            text-align: center;
        }
        input{
            width: 400px;
            height: 30px;
            margin-top: 10px;
            border-radius: 10px;
        }
        #dattour{
            position: relative;
            left: 400px;
            background-color: red;
            color: #ffff;
        }
        #dattour:hover{
            background-color: rgb(29, 202, 53);
        }
        #tenchuyendi{
            width: 200px;
        }
        #Price{
            width: 150px;
        }
    </style>
</head>

<body>
    <form action="">
        <h2>Thông Tin Đặt Tour</h2>
        <label for="">Tên chuyến đi:</label>
        <input type="text" id="tenchuyendi" name="tenchuyendi" value="<?php echo $_GET['tenchuyendi']; ?>" readonly>
        <input type="text" placeholder="Vui lòng nhập họ và tên" style="height: 40px;">
        <input type="text" placeholder="Vui lòng nhập SĐT" style="height: 40px;">
        <input type="text" placeholder="Vui lòng nhập địa chỉ" style="height: 40px;margin-bottom: 10px;">
        <br>

        <label for="">Chọn số người:</label>
        <select name="so_nguoi" id="so_nguoi">
            <option value="1">1 </option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="4">4</option>
            <option value="5">5 </option>
            <option value="6">6 </option>
            <option value="7">7 </option> 
            <option value="8">8 </option>
            <option value="9">9 </option>
            <option value="10">10 </option>
        </select>
        <br>
        <label for="">Giá/người:</label>
        <input type="text" id="Price" value="<?php echo $_GET['Price']; ?>" readonly>
        <br>
        <input type="button" value="Bấm vào đây để xem chi phí" style="width: 200px;" onclick="TinhTien();">
        <br>
        
        <label for="">Tổng thành tiền:</label>
        <input id="Thanhtoan" type="text" style="width: 150px;margin-bottom: 10px;">
        <br>
        <p>Sau khi bạn để lại thông tin và đặt tour DuLich3Mien.vn sẽ liên hệ với bạn sau 1-2 tiếng.Xin cảm ơn!</p>
        <input id="dattour" type="button" value="Đặt Tour" style="width: 70px;">






    </form>


    <script>
        function TinhTien(){
            var soLuong=parseInt(document.getElementById("so_nguoi").value);
            var price=parseInt(document.getElementById('Price').value);
            var money=price*soLuong;
            document.getElementById("Thanhtoan").value=money+" đồng";
        }

    </script>
</body>

</html>