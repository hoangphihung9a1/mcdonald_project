<html>
<header>
    <title>Edit menu</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />


</header>
<body class="container">
<div class="dropdown">
    <img src="<?=$GLOBALS['base_url'].'/assets/mm.png'?>" class=" avatar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/admin/homepage_view'?>">Về trang chủ</a>
        <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/user/logout'?>">Logout</a>

    </div>
</div>
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
<style>
    .avatar{
        background-color: white;
        border-radius: 25px;
        height: 50px;
        width: 50px;
        position: absolute;
        top: 0;
        right: 0px;
    }
</style>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>