<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>McDonald's</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light header fixed-top">
            <span class="collapse navbar-collapse col-md-12 " id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/4/4b/McDonald%27s_logo.svg" alt="Smiley face" height="42" width="42">
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link nav-header" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link nav-header" href="#">Tìm hiểu</a>
                    </li>
                    <li class="nav-item nav-menu menu-3" onmouseover="visible_ele('menu-hover-3')" onmouseout="disable_ele('menu-hover-3')">
                        <a class="nav-link nav-header" href="#" " >Thực đơn</a>
                        <div id="menu-hover-3" class="hover-3" onmouseover="visible_ele('menu-hover-3')" onmouseout="disable_ele('menu-hover-3')">
                            <div class="container">
                                <div class="row">
                                    <?php foreach ($menus as $menu):?>
                                        <div class="col-md-4" >
                                            <a class="nav-header" href=<?=$GLOBALS['base_url'].'/index.php/product/list_product?menu_id='.$menu['MenuId']?>><?php echo $menu['MenuName']?></a>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item  nav-menu">
                        <a class="nav-link nav-header" href="#">Khuyến mãi</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link nav-header" href="#">Tin tức</a>
                    </li>
<!--                    <li class="nav-item nav-menu">-->
<!--                        <a href="--><?//=$GLOBALS['base_url'].'/index.php/cart/view_cart' ?><!--" class="nav-link nav-header" href="#">Giỏ hàng</a>-->
<!--                    </li>-->
                    <a href="<?=$GLOBALS['base_url'].'/index.php/cart/view_cart' ?>" class="location">

                        <img class="img-cart" src="<?=$GLOBALS['base_url'].'/assets/product_img/cart.png'?>">

                        <div style="display: inline-block">
                                <input id="total_cart" class="total_cart" value=<?=!isset($total_cart) ? 0 : $total_cart?> >
                        </div>
                    </a>

                    <a href="" class="location">
                        <img class="img-location" src="https://mcdonalds.vn/public/images/location.png">
                        <p style="display: inline-block"><span style="font-size: 12px"><span style="color: #ffffff">Hệ thống</span><br><span style="font-size: 15px; color: orange">Cửa hàng</span></p>
                    </a>
                    <a href="" class="location">
                        <img class="img-location" src="https://mcdonalds.vn/public/images/delivery-menu.png">
                        <p style="display: inline-block"><span style="font-size: 12px"><span style="color: #ffffff">Giao hàng</span><br><span style="font-size: 15px; color: orange">McDelivery</span></p>
                    </a>
                </ul>
            </div>
        </nav>
    </div>

    <script>
        function disable_ele(x) {
            ele=document.getElementById(x);
            ele.style.display='none';

        }

        function visible_ele(x) {
            ele=document.getElementById(x);
            ele.style.display='block';

        }
    </script>
</body>
<style>
    .header{
        background-color: #191919 !important;
    }

    .logo{
        margin-left: 40px;
        width: 100px;
        height: 100px;
    }

    .nav-menu{
        padding: 28px 15px 0px 15px;
        font-size: 18px;
    }

    .location{
        border-radius: 30px;
        margin: 25px 0 0 20px;
        background-color: #bd0017;
        width: 150px;
        height: 55px;
        text-decoration-line: none !important;

    }

    .img-location{
        display: inline-block;
        margin: -20px 0 0 5px;
    }

    .nav-header{
        color:white !important;
        width:100%;
    }

    .hover-3{
        display: none ;
        width: 100%;
        height: 400px;
        background-color: rgba(25,25,25,0.8);
        position: absolute;
        left: 0;
        top: 100px;
        color: #ffffff !important;
    }

    a{
        text-decoration-line: none !important;
    }

    .img-cart{
        display: inline-block;
        width: 45%;
        padding: 0 0 0 20px;
    }

    .total_cart{
        width: 30px;
        height: 35px;
        text-align: center;
        border: none;
        background-color: #bd0017;
        /*margin-top: 15px;*/
        margin-left: 15px;
        padding-top: 16px;
        color: white;
        font-size: 20px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
