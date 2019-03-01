<html>
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
</head>
<body class="container">
<h1>Đăng ký</h1>
<form method="POST" action="<?= $GLOBALS['base_url'].'Admin/register'?>">
	<div class="form-group">
		<label>Tên cửa hàng</label>
		<input type="text" class="form-control" name="storeName" placeholder="Tên cửa hàng" required value="">
		<label>Mật khẩu</label>
		<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
		<label>Nhập lại mật khẩu</label>
		<input type="password" class="form-control" name="confirmedPassword" placeholder="Nhập lại mật khẩu" required>
		<label>Địa chỉ</label>
		<input type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
	</div>
	<button type="submit" class="btn btn-primary">Lưu</button>
</form>
</body>
</html>
