
<html>
<head>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<title>Thống kê Order</title>

<script>
    function convert_number(num){
        return (num).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' VNĐ';
    }

    function get_date(ele_id) {
        $('#'+ele_id).datetimepicker({
            format: 'YYYY-MM-DD'
        });
    }

    function submit_form(formName){
        document.getElementById('dateFrom').value=document.getElementById('dtp_dateFrom').value;
        document.getElementById('dateTo').value=document.getElementById('dtp_dateTo').value;
        document.getElementById('storeId').value=document.getElementById('slt_store').value;
        var ele = document.getElementById(formName);
        ele.submit();
        //console.log(document.getElementById('slt_store').value);
    }

    function change_cmd(ele){
        if(ele.value=='2'){
            document.getElementById('dtp5').removeAttribute('hidden');
            document.getElementById('dtp_dateFrom').placeholder='Từ ngày';
            document.getElementById('dtp_dateTo').placeholder='Đến ngày';
        }else{
            document.getElementById('dtp5').style.visibility='hidden';
            document.getElementById('dtp_dateTo').value='';
        }
    }

    function check() {
        <?php if(isset($_GET['storeId'])):?>
        document.getElementById('slt_store').value=<?= $_GET['storeId']?>;
        <?php endif;?>

        <?php if(isset($_GET['dateTo']) && $_GET['dateTo']!=''):?>
        document.getElementById('criteria_search').value='2';
        document.getElementById('dtp5').style.display='block';
        <?php endif;?>

    }

</script>
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
                <select id="criteria_search" class="form-control" onchange="change_cmd(this)">
                    <option value="1">Theo ngày</option>
                    <option value="2">Theo khoảng thời gian</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker4'>
                    <input id="dtp_dateFrom" placeholder="Chọn ngày" class="form-control" />
<!--                        set value for input date-->
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

        <div class='col-sm-3' id="dtp5" hidden>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input id="dtp_dateTo" class="form-control"/>
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
        <a id="btn_submit"  onclick="submit_form('f_date')" class="btn btn-primary" >Search</a>
        <div style="float: right">
            <label >Tổng doanh thu: </label>
            <span id="total_turnover" style="font-size: 20px"></span>
        </div>
    </div>

    <form id="f_date" method="get" action="<?=$GLOBALS['base_url'].'/index.php/admin/list_order'?>" >
        <input id="dateFrom" name="dateFrom" hidden>
        <input id="dateTo" name="dateTo" hidden>
        <input id="storeId" name="storeId" value="<?= $stores[0]['StoreId']?>" hidden>
    </form>
    <!--        // table-->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mã HĐ</th>
            <th scope="col">Khách hàng</th>
            <th scope="col">StoreId</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Coupon</th>
            <th scope="col">Total Money</th>
            <th scope="col">Pay Method</th>
            <th scope="col">StatusId</th>
            <th scope="col">OrderDetail</th>

        </tr>
        </thead>
        <tbody>
        <?php if(isset($orders)):?>
            <?php $total_turnover=0; foreach ($orders as $order): $total_turnover+=$order['TotalMoney']?>
                <tr>
                    <th scope="row"><?=$order['OrderId']?></th>
                    <td><?=$order['CustomerId']?></td>
                    <td><?=$order['StoreId']?></td>
                    <td><?=$order['OrderDate']?></td>
                    <td><?=$order['ShippingAddress']?></td>
                    <td><?=$order['Coupon']?></td>
                    <td><script>document.write(convert_number(<?=$order['TotalMoney']?>))</script></td>
                    <td><?=$order['PayMethod']?></td>
                    <td><?=$order['StatusId']?></td>
                    <td><a href="<?= $GLOBALS['base_url'].'/index.php/admin/order_detail?order_id='.$order['OrderId']?>" class="btn btn-primary"> Chi tiết</a></td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
<!--    //pagination-->
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-cus">

            <?php if(isset($total_page)&&$total_page>0):?>
                <?php (isset($_GET['page'])) ? $curr_page=$_GET['page'] : $curr_page=1; ?>
                    <li class="page-item" ><a id="page_first" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/list_order?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page=1&storeId='.$_GET['storeId']?>" > <span aria-hidden="true">&laquo;</span> </a></li>
                    <li class="page-item"><a id="page_previous" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/list_order?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page-1).'&storeId='.$_GET['storeId']?>" ><span aria-hidden="true">Previous</span></a></li>
                    <li class="page-item"><a id="curr_page" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/list_order?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page).'&storeId='.$_GET['storeId']?>" ><?=($curr_page)?></a></li>
                    <li class="page-item"><a id="page_next" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/list_order?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($curr_page+1).'&storeId='.$_GET['storeId']?>" > Next </a></li>
                    <li class="page-item"><a id="page_last" class="page-link"  href="<?=$GLOBALS['base_url'].'/index.php/admin/list_order?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&page='.($total_page).'&storeId='.$_GET['storeId']?>" > <span aria-hidden="true">&raquo;</span> </a></li>
            <?php endif;?>

        </ul>
    </nav>

    <script>

        //update tong doanh thu
        <?php if(isset($total_turnover)):?>
            document.getElementById('total_turnover').innerHTML=convert_number(<?=$total_turnover ?>);
        <?php endif;?>

        function get_val(id){
            return document.getElementById(id).value;
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


        // //submit form with jQuery
        //        // $( "#btn_submit" ).click(function() {
        //        //     $( "#f_date" ).submit();
        //        // });
    </script>
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
</html>
