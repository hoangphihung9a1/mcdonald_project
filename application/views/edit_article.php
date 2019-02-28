<html>
<header>
    <title>Thêm mới danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?= $GLOBALS['base_url'] ?>/assets/ckeditor/ckeditor.js"></script>

</header>
<body class="container">
<h1>Thêm mới danh mục bài viết</h1>
<form method="get" action="<?= $GLOBALS['base_url'].'/index.php/Article/edit_article'?> ">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên danh mục</label>
        <input name="id" value="<?=$_GET['id']?>" hidden>
        <input name="Title" type="text" class="form-control" value="<?= $article[0]['Title'];?>" id="Title"  placeholder=" Nhập tên danh mục bài viết">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nội dung bài viết</label>
        <textarea class="ckeditor" name="Content" data-value="<?= $article[0]['Content'];?>"></textarea>
        <script type="text/javascript">
            config = {};
            config.entities_latin = false;
            config.lenguage = 'vi';
            CKEDITOR.replace('Content',config);
        </script>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Hình ảnh bài viết</label>
        <input name="ImageLink" type="text" class="form-control" value="<?= $article[0]['ImageLink'];?>" id="ImageLink"  placeholder="Nhập link hình ảnh">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">
        Chỉnh sửa
    </button>
</form>
<script type="text/javascript" href="<?= $GLOBALS['base_url'] ?>/ckeditor/ckeditor.js"></script>
</body>
</html>