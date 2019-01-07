<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<html>
<body class="container">


<form method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/product/add_product">
    <div class="form-group">
        <input class="form-control" name="product_name" placeholder="Tên sản phẩm">

        <select class="form-control" name="menu_id">
            <?php foreach ($menus as $menu ):?>
                <option value="<?php echo $menu['MenuId']?>" > <?php echo $menu['MenuName']?> </option>
            <?php endforeach;?>
        </select>

        <textarea name="product_describe" placeholder="Mô tả về sản phẩm" rows="3" class="form-control" ></textarea>
        <input class="form-control" name="product_price" placeholder="Giá sản phẩm">
        <input class="form-control" name="product_img_link" placeholder="Chèn link ảnh">

    </div>
    <button type="submit">Thêm</button>
</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>