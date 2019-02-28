<html>
<header>
    <title>Danh sach danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <meta charset="UTF-8" />
</header>
<body class="container">
<h1>Danh sach danh mục bài viết</h1>
<a href="<?php $GLOBALS['base_url'] ?>/index.php/Article/add_article" class="btn btn-primary">Thêm mới</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Tên Danh Mục</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Thao Tác</th>
    </thead>
    <tbody>

    <?php foreach ($articles as $article): ?>

        <tr>
            <th scope="row"><?= $article['ArticleId'] ?></th>
            <td><?= $article['Title'] ?></td>
            <td><img width="200px" height="auto" src="<?= $article['ImageLink'] ?>"></td>
            <td>

                <p><i class="fa fa-close"></i>
                <form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/Article/delete_article">
                    <input name="id" type="hidden" value="<?= $article['ArticleId'] ?>">
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
                </p>
                <p><i class="fa fa-edit"></i>

                <form method="post" action="<?= $GLOBALS['base_url'].'/index.php/Article/edit_article?id='.$article['ArticleId']?>">
                    <!--<form method="post" action="edit_category.php">-->
                    <input name="id" type="hidden" value="<?= $article['ArticleId'] ?>">
                    <input name="category_name" type="hidden" value="<?= $article['Title'] ?>">
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