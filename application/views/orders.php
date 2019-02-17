<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>



<script>
    function convert_number(num){
        return (num).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' VNĐ';
    }
</script>

<body>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker4'>
                    <form id="f_date_page" method="get" action="<?=$GLOBALS['base_url'].'/index.php/admin/list_order'?>" >
                        <input id="date" name="date" type='text' class="form-control" />
<!--                        set value for input date-->
                        <script>
                            <?php if(isset($_GET['date'])):?>
                                document.getElementById('date').value='<?= $_GET['date']?>';
                            <?php endif;?>
                        </script>
                        <input id="page" name="page" hidden >
                    </form>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <a id="btn_submit"  onclick="submit_form('f_date_page')" class="btn btn-primary" >Search</a>
        <div style="float: right">
            <label >Tổng doanh thu: </label>
            <span id="total_turnover" style="font-size: 20px"></span>
        </div>
    </div>
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
        </tbody>
    </table>
<!--    //pagination-->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" onclick="submit_form('f_date_page',1)" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for ($i=0; $i<$total_page;$i++):?>
                <li class="page-item"><a class="page-link" onclick="submit_form('f_date_page',<?= ($i+1) ?>)" href="#" ><?=($i+1)?></a></li>
            <?php endfor;?>
            <li class="page-item">
                <a class="page-link" onclick="submit_form('f_date_page',<?= $total_page ?>)" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

    <script type="text/javascript">


        //update tong doanh thu
        document.getElementById('total_turnover').innerHTML=convert_number(<?=$total_turnover ?>);

        function get_val(id){
            return document.getElementById(id).value;
        }



        function submit_form(formName,p_page){
            var ele = document.getElementById(formName);
            var page;
            if(!isNaN(p_page)){
                page=p_page;
            } else page=1;
            document.getElementById('page').value=page;
            ele.submit();
            // console.log(document.getElementById('page').value);
        }

        //submit form with jQuery
        $( "#btn_submit" ).click(function() {
            $( "#f_date" ).submit();
        });

        $(function() {
            // Bootstrap DateTimePicker v4
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
</body>

