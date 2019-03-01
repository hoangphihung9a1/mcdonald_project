<html>
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
</head>
<body class="container">
<h1>Đăng nhập</h1>
	<form method="POST" action="<?= $GLOBALS['base_url'].'User/login'?>">
		<div class="form-group">
			<label>Tên tài khoản</label>
			<input type="text" class="form-control" name="username" placeholder="Tên tài khoản" required>
			<label>Mật khẩu</label>
			<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
		</div>
		<button type="submit" class="btn btn-primary">Đăng nhập</button>
	</form>
	<a href=<?= $GLOBALS['base_url'].'User/register'?>><button class="btn btn-success">Đăng ký</button></a>
</body>
</html>
