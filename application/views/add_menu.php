<html>
<header>
    <title>Thêm mới menu</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />

</header>
<body class="container">
<h1>Thêm mới menu</h1>
<form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/menu/add_menu">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên menu </label>
        <input name="menu_name" type="text" class="form-control" id="menu_name"  placeholder="Nhập vào tên menu">
    </div>
    <button type="submit" class="btn btn-primary">
        Thêm mới
    </button>
</form>
</body>
</html>