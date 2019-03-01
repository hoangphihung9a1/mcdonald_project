<html>
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
</head>
<body class="container">
<h1>Đăng ký</h1>
<form method="POST" action="<?= $GLOBALS['base_url'].'User/register'?>">
	<div class="form-group">
		<label>Tên đầy đủ</label>
		<input type="text" class="form-control" name="fullname" placeholder="Tên đầy đủ" required value="">
		<label>Số điện thoại</label>
		<input type="text" class="form-control" name="phoneNumber" placeholder="Số điện thoại" required>
		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="Email" required>
		<label>Địa chỉ</label>
		<input type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
		<label>Tên tài khoản</label>
		<input type="text" class="form-control" name="username" placeholder="Tên tài khoản" required>
		<label>Mật khẩu</label>
		<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
		<label>Nhập lại mật khẩu</label>
		<input type="password" class="form-control" name="confirmedPassword" placeholder="Nhập lại mật khẩu" required>
	</div>
	<button type="submit" class="btn btn-primary">Lưu</button>
	<a href="<?= $GLOBALS['base_url'].'User/login'?>"><button class="btn btn-success">Quay lại</button></a>
</form>
</body>
</html>
