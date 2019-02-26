<html>
<header>
    <title>Danh sach danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <meta charset="UTF-8" />
</header>
<body>
<div class="container baner-1" >
    <div>
        <img class="title-3" src="<?= $article1[0]['ImageLink'] ?>">
        <div>
            <p style="font-size: 21px;line-height: 1.3; color:#444444;padding-top: 10px"><strong><?= $article1[0]['Title'] ?></strong></p>
        </div>
        <div class="row">
            <div class="col-md-8" style="font-size: 10.5pt ">
                <?= $article1[0]['Content'] ?>
            </div>
            <div class="col-md-4">
                <strong><p style="font-size: 18px">TIN LIÊN QUAN</p></strong>

                <?php foreach ($articles2 as $article2): ?>
                    <div>
                        <img width="100%" height="208px" src="<?= $article2['ImageLink'] ?>">
                    </div>

                    <div>
                        <a style="text-decoration: none;" href="<?= $GLOBALS['base_url'].'/index.php/Article/news?id='.$article2['ArticleId']?>">
                            <p style="font-size: 20px;line-height: 1.6; color:#444444;padding-top: 10px"><?= $article2['Title'] ?></p>
                        </a>
                    </div>



                <?php endforeach; ?>
            </div>

        </div>

    </div>

</div>
</body>
<style>
    /*.baner-1{*/
    /*padding-right: -5px;*/
    /*padding-left: -50px;*/
    /*}*/
    .menu-name{
        margin-top: 120px;
        margin-bottom: 30px;
        color: #888888;
        font-family: Cambria;
        font-size: 30px;
        width: 100%;
    }
    .img-name{
        width: 100%;
        height: auto;
        max-width: 100%;

    }
    .title-1{
        font-size: 30px;
        line-height: 1.3;
        margin: 12px 0;
        color: #428bca;
    }

    .title-2{

        padding-left: 20px;
        padding-bottom: 20px;
        display: block;
        width: 100px;
        max-width: 100%;
        height: auto;
    }
    .title-3{
        margin-top: 130px;
        width: 100%;
        height: 100%;
    }

</style>
</html>