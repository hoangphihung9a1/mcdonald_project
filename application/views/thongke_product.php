<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<html>
<body onload="check()">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control" onchange="catch_value(this)" " >
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
                        <input id="dtp_dateFrom" name="dateFrom" type='text' class="form-control" />
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
        <input id="menu_id" name="menu_id" value="<?= $menus[0]['MenuId']?>" hidden>
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
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php if(isset($total_page)):?>
                <?php for($i=0;$i<$total_page;$i++):?>
                    <li class="page-item"><a class="page-link" href="<?=$GLOBALS['base_url'].'/index.php/admin/thongke_product?dateFrom='.$_GET['dateFrom'].'&dateTo='.$_GET['dateTo'].'&menu_id='.$_GET['menu_id'].'&page='.($i+1)?>"><?=($i+1)?></a></li>
                <?php endfor;?>
            <?php endif;?>

            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</body>
<script>
    function check() {
        <?php if($_GET['dateTo']!=''):?>
            document.getElementById('criteria_search').value='2';
            document.getElementById('dtp5').removeAttribute('hidden');
        <?php endif;?>
    }

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

</script>
</html>



