<head>
<title>Trang chủ</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="dropdown">
            <img src="<?=$GLOBALS['base_url'].'/assets/mm.png'?>" class=" avatar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/admin/homepage_view'?>">Về trang chủ</a>
                <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/user/logout'?>">Logout</a>

            </div>
        </div>
        <h3><span style="color: #bd0017">Xin mời lựa chọn chức năng: </span></h3>
        <form method="get" action="<?=$GLOBALS['base_url'].'/index.php/admin/homepage_view'?>" >
            <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select name="opt" class="form-control">
                                <option value="1">Thống kê Order</option>
                                <option value="2">Thống kê Product</option>
                                <?php if($_SESSION['user']['Type']==1):?>
                                    <option value="3">Quản lí menu</option>
                                    <option value="4">Quản lí sản phẩm</option>
                                    <option value="5">Quản lí tin tức</option>
                                <?php endif;?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Chọn</button>
                    </div>
            </div>
        </form>
    </div>


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
