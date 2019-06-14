<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Giỏ hàng</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php
        $tong=0;
        $slsp=0; 
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
            <li><a href="index1.php">TRANG CHỦ</a></li>
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
            <?php
				include("../connect.php");
				$masp=$_GET['masp'];
				$sql="select * from sanpham where mahang= '$masp'";
				$tt=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($tt);
			?>
            <div class="right">
            	<div class="chitiet">
                <form method="post">
                	<table>
                    	<tr>
                            <td id="td_1">
                                <?php echo "<img src='img/".$row['anh']."' width='200px' height='180px'>"; ?>
                            </td>
                            <td>
                                <p>
                                Mã sp: <?php echo $row['mahang'];?><br>
                        	    Tên sp: <?php echo $row['tenhang'];?><br>
                                Hãng sản xuất: <?php echo $row['hangsx'];?><br>
                        	    Giá thành: <?php echo $row['gia']."vnđ";?><br>
                                </p>
                            </td>  
                        </tr>
                        <tr>
                            <td>Số lượng hàng cần mua: 
                                <input type="number" name="slsp" value="<?php if(isset($_POST['check'])){
                                                                                echo $_POST['slsp'];
                                                                                }
                                                                             else{
                                                                              echo 1;} 
                                                                              ?>">
                                <br>số lượng hiện có của sp: <?php echo $row['soluong']." Sản phẩm";?>
                            </td>
                            <td colspan="2">
                            	Tổng số: <?php
    								if(isset($_POST['check'])){
    									$slsp=$_POST['slsp'];
    									$sl=$row['soluong']-$slsp;
    									if($slsp <= $row['soluong']){
    										echo $tong=$slsp*$row['gia'];
    										$sql2="Update sanpham set soluong=$sl where mahang= '$masp'";
    										$tt2=mysqli_query($conn,$sql2);
    									}
									else {
											echo "Sản phẩm không đủ hàng";
									}
								}
                                else echo "0 vnđ";
							?> vnđ
                        </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><button type="submit" name="check">Kiểm tra</button>
                                <button type="submit" name="ok">Mua</button>
                            </td>
                        </tr>
                        </table>
                    </form>
                    <?php
                        $tenhang = $row['tenhang'];
                        $hangsx = $row['hangsx'];
                        if(isset($_POST['ok'])){
                            $sql3="insert into cart ('mahang', 'tenhang', 'gia', 'soluong', 'hangsx')
                                values ('$masp', 'tenhang', '$tong', '$slsp', '$hangsx')";
                            $tt3=mysqli_query($conn,$sql3);
                            if($tt3){
                                echo "Đã thêm vào giỏ hàng thành công";
                            }
                            else{
                                echo "Thêm vào giỏ hàng thất bại";    
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
            else{
                header('location:login.php');
              }
        ?>
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