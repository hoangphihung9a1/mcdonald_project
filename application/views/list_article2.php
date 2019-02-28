<html>
<header>
    <title>Danh sach danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <meta charset="UTF-8" />
</header>
<body>
<div class="container">
    <p class="menu-name">Tin tức</p>
    <div class="row">
        <div class="col-md-6">
            <div>
                <img class="img-name" src="../../assets/article_img/<?=$articles1[0]['ImageLink'] ?>">
            </div>
            <div>
                <a href="<?= $GLOBALS['base_url'].'/index.php/Article/news?id='.$articles1[0]['ArticleId']?>"><h1 class="title-1" ><strong>   <?= $articles1[0]['Title'] ?></strong>
                    </h1></a>
            </div>

        </div>
        <div class="col-md-6">
            <div class="row">
                <?php foreach ($articles1 as $article1): ?>
                    <div class="col-md-4">
                        <img class="title-2" src="../../assets/article_img/<?= $article1['ImageLink'] ?>">
                    </div>
                    <div class="col-md-8">
                        <a href="<?= $GLOBALS['base_url'].'/index.php/Article/news?id='.$article1['ArticleId']?>">
                            <p style="font-size: 18px;line-height: 1.3; color: #428bca;"><strong><?= $article1['Title'] ?></strong></p>
                            <?php
                            $cString = $article1['Content'];
                            $iChar = "200"; // Max number of character(s) for cutting
                            $iOutput = "100"; // Max number of character(s) for the output
                            if(strlen($cString) > $iChar)
                            {
                                $cOutput = mb_substr($cString, 0, $iOutput, "UTF-8");
                                while(substr($cOutput, -1) != " ")
                                {
                                    $cOutput = substr($cOutput, 0, strlen($cOutput)-1);
                                }
                                $cString = $cOutput."...";
                            }
                            ?>
                        </a>
                        <p><?= $cString ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>

</body>
<style>
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
        width: 100%;
        max-width: 100%;
        height: auto;
    }
</style>
</html>