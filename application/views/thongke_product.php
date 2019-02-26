<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
    function check() {
        <?php if(isset($_GET['menu_id'])) :?>
            document.getElementById('slt_menu_id').value=<?=$_GET['menu_id']?>;
        <?php endif;?>

        <?php if($_GET['dateTo']!=''):?>
        document.getElementById('criteria_search').value='2';
        document.getElementById('dtp5').removeAttribute('hidden');
        <?php endif;?>

        <?php if(isset($_GET['storeId'])):?>
            document.getElementById('slt_store').value=<?= $_GET['storeId']?>
        <?php endif;?>
    }
</script>
<title>Thống kê Product</title>
</head>

<body onload="check()">
<div class="container">
    <div class="dropdown">
        <img src="<?=$GLOBALS['base_url'].'/assets/mm.png'?>" class=" avatar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/admin/homepage_view'?>">Về trang chủ</a>
            <a class="dropdown-item" href="<?=$GLOBALS['base_url'].'/index.php/user/logout'?>">Logout</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select id="slt_store" class="form-control" >
                    <?php foreach ($stores as $store):?>
                        <option value="<?= $store['StoreId']?>"><?= $store['StoreName']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select id="slt_menu_id" class="form-control"  " >
                <?php foreach ($menus as $menu):?>
                    <option value=<?=$menu['MenuId']?> ><?= $menu['MenuName']?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select id="criteria_search" class="form-control" onchange="change_cmd(this)" " >
                    <option value="1">Theo ngày</option>
                    <option value="2">Theo khoảng thời gian</option>
                </select>
            </div>
        </div>
    </div>


    <div class="row" >
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker4'>
                        <input id="dtp_dateFrom" name="dateFrom" placeholder="Chọn ngày" type='text' class="form-control" />
                        <script>
                            <?php if(isset($_GET['dateFrom'])):?>
                            document.getElementById('dtp_dateFrom').value='<?= $_GET['dateFrom']?>';
                            <?php endif;?>
                        </script>

                    <span class="input-group-addon">
                        <span onclick="get_date('datetimepicker4')" class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>

        <div id="dtp5" class='col-sm-3' hidden>
            <div class="form-group">
                <div class='input-group date' id="datetimepicker5">
                    <input id="dtp_dateTo" name="dateTo" class="form-control">
                    <script>
                        <?php if(isset($_GET['dateTo'])):?>
                        document.getElementById('dtp_dateTo').value='<?= $_GET['dateTo']?>';
                        <?php endif;?>
                    </script>

                    <span class="input-group-addon">
                        <span onclick="get_date('datetimepicker5')" class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <a id="btn_submit"  onclick="submit_form('f_date_page')" class="btn btn-primary" >Search</a>
    </div>

    <form id="f_date_page" method="get" action="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product'?>" >
        <input id="dateFrom" name="dateFrom" hidden>
        <input id="dateTo" name="dateTo" hidden>
        <input id="page" name="page" hidden >
        <input id="menu_id" name="menu_id"  hidden>
        <input id="storeId" name="storeId"  hidden>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Ma san pham</th>
            <th scope="col">Ten san pham</th>
            <th scope="col">Doanh số</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Doanh thu</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($products)):?>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?=$product['ProductId'] ?></th>
                    <td><?=$product['ProductName'] ?></td>
                    <td><?=$product['Quantity'] ?></td>
                    <td><?=$product['Price'] ?></td>
                    <td><?=$product['Price']*$product['Quantity'] ?></td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
<!--    Pagination-->
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-cus">
            <?php if(isset($total_page)&&$total_page>0):?>
                <?php (isset($_GET['page'])) ? $curr_page=$_GET['page'] : $curr_page=1; ?>
                <li class="page-item" ><a id="page_first" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page=1&storeId='.$_GET['storeId'].'&menu_id='.$_GET['menu_id']?>" > <span aria-hidden="true">&laquo;</span> </a></li>
                <li class="page-item"><a id="page_previous" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page-1).'&storeId='.$_GET['storeId'].'&menu_id='.$_GET['menu_id']?>" ><span aria-hidden="true">Previous</span></a></li>
                <li class="page-item"><a id="curr_page" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page).'&storeId='.$_GET['storeId'].'&menu_id='.$_GET['menu_id']?>" ><?=($curr_page)?></a></li>
                <li class="page-item"><a id="page_next" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page+1).'&storeId='.$_GET['storeId'].'&menu_id='.$_GET['menu_id']?>" > Next </a></li>
                <li class="page-item"><a id="page_last" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($total_page).'&storeId='.$_GET['storeId'].'&menu_id='.$_GET['menu_id']?>" > <span aria-hidden="true">&raquo;</span> </a></li>
            <?php endif;?>
        </ul>
    </nav>
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

    .pagination-cus{
        position: fixed;
        bottom: 10px;
        left: 40%;
    }
</style>
<script>


    function catch_value(ele) {
        //document.getElementById('menu_id').value=menuId;
        var ele_menu_id=document.getElementById('menu_id');
        ele_menu_id.value=ele.value;
        console.log(ele_menu_id.value);
    }

    function change_cmd(ele) {
        var ele_dateTo= document.getElementById('dtp5');
        if(ele.value=='2'){
            //ele_dateTo.removeAttribute('hidden');
            $(ele_dateTo).show();
            document.getElementById('dtp_dateFrom').placeholder='Từ ngày';
            document.getElementById('dtp_dateTo').placeholder='Đến ngày';
        }else if(ele.value=='1'){
            ele_dateTo.setAttribute("hidden","");
        }
        console.log(ele_dateTo);
    }

    function submit_form(formName,p_page){
        var ele = document.getElementById(formName);
        var page;
        if(!isNaN(p_page)){
            page=p_page;
        } else page=1;
        document.getElementById('page').value=page;
        document.getElementById('storeId').value=document.getElementById('slt_store').value;
        document.getElementById('menu_id').value=document.getElementById('slt_menu_id').value;
        document.getElementById('dateFrom').value=document.getElementById('dtp_dateFrom').value;
        if(document.getElementById('criteria_search').value==2){
            document.getElementById('dateTo').value=document.getElementById('dtp_dateTo').value;
        }else{
            document.getElementById('dateTo').value='';
        }
        ele.submit();
        // console.log(document.getElementById('page').value);
    }

    //submit form with jQuery
    // $( "#btn_submit" ).click(function() {
    //     $( "#f_date_page" ).submit();
    // });

    // $(function() {
    //     // Bootstrap DateTimePicker v4
    //     $('#datetimepicker4').datetimepicker({
    //         format: 'YYYY-MM-DD'
    //     });
    // });
    //
    // $(function() {
    //     // Bootstrap DateTimePicker v4
    //     $('#datetimepicker5').datetimepicker({
    //         format: 'YYYY-MM-DD'
    //     });
    // });

    function get_date(ele_id) {
        $('#'+ele_id).datetimepicker({
            format: 'YYYY-MM-DD'
        });
    }

    //display pagination
    <?php if(isset($total_page)):?>
        <?php if ($total_page>1): ?>
            <?php if($curr_page==1) :?>
                document.getElementById('page_first').style.visibility='hidden';
                document.getElementById('page_previous').style.visibility='hidden';
            <?php elseif ($curr_page==$total_page): ?>
                document.getElementById('page_next').style.visibility='hidden';
                document.getElementById('page_last').style.visibility='hidden';
            <?php endif;?>
        <?php elseif ($total_page==1): ?>
            document.getElementById('page_first').style.visibility='hidden';
            document.getElementById('page_previous').style.visibility='hidden';
            document.getElementById('page_next').style.visibility='hidden';
            document.getElementById('page_last').style.visibility='hidden';
        <?php endif;?>
    <?php endif;?>
</script>
</html>



