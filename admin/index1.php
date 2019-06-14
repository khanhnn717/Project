<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php 
  include('../connect.php');
  session_start();
  if(!isset($_SESSION['user'])=="")
{
  ?>
    <div class="container">
      <div class="header">
        <div class="hotline">
          <p>Thông tin liên hệ: 0972606*** | Khanhnn717@gmail.com</p>
          <div class="user">
              Hello: <a href="#">
              <?php echo $_SESSION['user']; ?></a>
              <span> | </span>
              <a href="logout.php">Logout</a>
          </div>
        </div>
        <div class="logo">
          <a href="index1.php"><img src="img/logo2.png"></a>
          <div class="search">
            <input type="text" name="ipsearch" placeholder="Nhập từ khóa">
            <button type="submit" name="search"> Search </button>
          </div>
        </div>
      </div>
      <div class="banner">
        
      </div>
        <div class="nav">
          <ul>
            <li><a href="#">TRANG CHỦ</a></li>
            <li><a href="#">GIỚI THIỆU</a></li>
            <li><a href="#">SẢN PHẨM</a></li>
            <li><a href="#">TIN TỨC</a></li>
            <li><a href="#">LIÊN HỆ</a></li>
          </ul>
        </div>
        <div class="content">
          <div class="left">
              <p>
                LOẠI SẢN PHẨM
              </p>
              <ul>
                  <li><a href="#">Áo</a></li>
                  <li><a href="#">Quần</a></li>
                </ul>
            </div>
            <div class="right" >
              <div class="right_title">
                <h1>DANH SÁCH SẢN PHẨM</h1>
              </div>
              <?php include("../connect.php");
                $sql ="select * from sanpham";
                $tt=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($tt)){
              ?>
                  <div class="sp">
                <?php echo "<img src='img/".$row['anh']."' width='180px' height='120px'/>"; ?><br>
                    <p><?php
                      echo "Tên sản phẩm: ".$row['tenhang']."<br>";
                      echo "Hãng: ".$row['hangsx']."<br>";
                      echo "Giá: ".$row['gia']."vnđ"."<br>";
                      echo "Hiện còn: ".$row['soluong']." sản phẩm"."<br>";
                    ?>
                  <div class="nut">
                      <?php echo "<a href='chitiet.php?masp=".$row['mahang']."'>";?><button type="submit">Giỏ hàng</button></a>
                      <?php echo "<a href='giohang.php?masp=".$row['mahang']."'>";?><button type="submit">Giỏ hàng</button></a>
                  </div>
                    </p>
                    </div>
                <?php
                }
              }
              else{
                header('location:login.php');
              }
        ?>
            </div>
        </div>
        <div class="footer">
          <p>
            <h3>Địa chỉ: 1 New york</h3>
            <h3>Điện thoại: 0972606***</h3>
            <h3>Email: Khanhnn717@gmail.com</h3>
          </p>
        </div>
    </div>
</body>
</html>