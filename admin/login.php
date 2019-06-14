<?php
	session_start();
	include("../connect.php");
$error = "";
	if (isset($_POST["submit"])) {
		$user = trim($_POST["username"]);
		$pass = trim($_POST["password"]);
		if ($user != "" && $pass != "") {
			$pass = md5($pass);
			
			$sql = "  
				SELECT * FROM user WHERE `username`= '$user' and `password` = '$pass'
			";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$error = "";
				$_SESSION["user"] = $user;
				header('Location: index1.php');
			}else{
				$error = '<p class="error">Tài Khoản hoặc mật khẩu không chính xác</p>
				<div class="input-box">';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style-login.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<form method="post" action="">
				<div class="title">
					Đăng nhập vào tài khoản của bạn
				</div>
				<?php
					if ($error != "") {
						echo $error;
					}
				?>
				<div class="input-box">
					<input type="text" required name="username">
					<span>Tài khoản</span>
				</div>
				<div class="input-box">
					<input type="password" required name="password">
					<span>Mật khẩu</span>
				</div>
				<button type="submit" name="submit" class="submit">Đăng nhập</button>
			</form>
			<div class="support">
				<a href="#">Quên mật khẩu</a>
				<a href="register.php">Đăng ký</a>
				<a href="index.php">Trang chủ</a>
			</div>
		</div>
	</div>
</body>
</html>