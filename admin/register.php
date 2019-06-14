<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <form method="post">
    <div class="container">
      <div class="header">
        <div class="hotline">
          <p>Thông tin liên hệ: 0972606*** | Khanhnn717@gmail.com</p>
          <div class="user">
            <a href="register.php">Đăng kí</a>
            <span> | </span>
            <a href="login.php">Đăng Nhập</a>
          </div>
        </div>
        <div class="logo">
          <img src="img/logo2.png">
          <div class="search">
            <input type="text" name="ipsearch" placeholder="Nhập từ khóa">
            <button type="submit" name="search"> Search </button>
          </div>
        </div>
      </div>
      <div class="banner">
      </div>
      <div class="main_1">
          <form method="post" enctype="multipart/form-data">
            <table cellspacing="0">
              <tr>
                <th colspan="2">ĐĂNG KÍ TÀI KHOẢN</th>
              </tr>
              <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text" name="user"/></td>
              </tr>
              <tr>
                <td>Mật khẩu: </td>
                <td><input type="password" name="password"/></td>
              </tr>
              <tr>
                <td>Nhập lại mật khẩu: </td>
                <td><input type="password" name="repassword"/></td>
              </tr>
              <tr>
                <th colspan="2">THÔNG TIN LIÊN HỆ</th>
              </tr>
              <tr>
                <td>Tên đầy đủ: </td>
                <td><input type="text" name="fullname"/></td>
              </tr>
              <tr>
                <td>Giới tính: </td>
                <td><input type="radio" name="sex" value="Nam"/>
                  Nam
                  <input type="radio" name="sexx" value="Nữ"/>
                  Nữ </td>
              </tr>
              <tr>
                <td>Ngày sinh: </td>
                <td><input type="date" name="age"/></td>
              </tr>
              <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="address"/></td>
              </tr>
              <tr>
                <td>Email: </td>
                <td><input type="email" name="email"/></td>
              </tr>
              <tr>
                <td>Điện thoại: </td>
                <td><input type="tel" name="phone"/></td>
              </tr>
          	<tr>
          		<td>Ảnh avatar(nếu có)</td>
          		<td><input type="file" name="img"><span>(ảnh gif hoặc jpg)</span></td>
          	</tr>
              <tr>
                <td colspan="2"><button type="submit" name="ok">Đăng kí</button></td>
              </tr>
            </table>
          </form>
          </body>
          </html>
          <?php
          	session_start();
          	include("../connect.php");
           ?>
          <?php
           if(isset($_POST['ok'])){
          		 $user=$_POST['user'];
          		 $pass=$_POST['password'];
          		 $name=$_POST['fullname'];
          		 $sex=$_POST['sex'];
          		 $age=$_POST['age'];
          		 $address=$_POST['address'];
          		 $email=$_POST['email'];
          		 $phone=$_POST['phone'];
          		 $anh1 = $_FILES['img']['tmp_name'];
          		 $anh2 = $_FILES['img']['name'];
          		 $up = move_uploaded_file($anh1,"avatar/".$anh2);
          		 $sql="insert into user (username,password,email,phone,addres,fullname,age,avatar,sex)
          				values('$user','$pass','$email','$phone','$address','$name','$age','$anh2','$sex')";
          		 $tt=mysqli_query($conn,$sql);
          		 if($tt){
          			 echo "Success";
          			 }
          		 else{
          			 echo "Fails";
          			 }
          	 }
           ?>
        </div>
      </div>
    </form>
  </body>
</html>