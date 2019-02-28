
<html>
<header>
    <title>Danh sach menu</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <meta charset="UTF-8" />
</header>
<body class="container">
<h1>Danh sach menu</h1>
<a href="<?= $GLOBALS['base_url'].'/index.php/menu/add_menu'?>" class="btn btn-primary">Thêm mới</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Ten menu</th>
        <th scope="col">Thao tac</th>
    </thead>
    <tbody>

    <?php foreach ($menus as $menu): ?>

        <tr>
            <th scope="row"><?= $menu['MenuId'] ?></th>
            <td><?= $menu['MenuName'] ?></td>
            <td>

                <p><i class="fa fa-close"></i>
                <form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/menu/delete_menu">
                    <input name="menu_id" type="hidden" value="<?= $menu['MenuId'] ?>">
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
                </p>
                <p><i class="fa fa-edit"></i>

                <form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/menu/edit_menu">
                    <!--<form method="post" action="edit_category.php">-->
                    <input name="menu_id" type="hidden" value="<?= $menu['MenuId'] ?>">
<!--                    <input name="category_name" type="hidden" value="--><?//= $menu['Title'] ?><!--">-->
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
                </p>
            </td>
        </tr>


    <?php endforeach; ?>

    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">

    </ul>
</nav>
</body>
</html>