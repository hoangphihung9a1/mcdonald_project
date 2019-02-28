<html>
<header>
    <title>Edit menu</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />

</header>
<body class="container">
<h1>Edit menu</h1>
<form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/menu/edit_menu">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên menu </label>
        <input name="menu_id" value="<?=$menu['MenuId']?>" hidden>
        <input name="menu_name_new" type="text" class="form-control" id="menu_name_new"  placeholder="<?=$menu['MenuName']?>">
    </div>
    <button type="submit" class="btn btn-primary">
        Thêm mới
    </button>
</form>
</body>
</html>