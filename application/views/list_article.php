<html>
<header>
    <title>Danh sach danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />

    <meta charset="UTF-8" />
</header>
<body class="container">
<div class="dropdown">
    <img src="<?=$GLOBALS['base_url'].'/assets/mm.png'?>" class=" avatar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/admin/homepage_view'?>">Về trang chủ</a>
        <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/user/logout'?>">Logout</a>

    </div>
</div>
<h1>Danh sach danh mục bài viết</h1>
<a href="<?= $GLOBALS['base_url'].'/index.php/Article/add_article'?>" class="btn btn-primary">Thêm mới</a>
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
            <td><img width="200px" height="auto" src="../../assets/article_img/<?= $article['ImageLink'] ?>"></td>
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