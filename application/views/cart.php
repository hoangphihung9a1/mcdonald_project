<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<html>
<script>
    function convert_number(num){
        return (num).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' VNĐ';
    }
</script>
<body>
    <div class="container">
        <div class="title">
            <div class="row">
                <div class="col-6">THÔNG TIN SẢN PHẨM</div>
                <div class="col-2">ĐƠN GIÁ</div>
                <div class="col-2">SỐ LƯỢNG</div>
                <div class="col-2">THÀNH TIỀN</div>
            </div>
        </div>


        <div id="cart" class="container-fluid">
            <?php if(isset($cart)): $total_to_be_purchased=0;
                foreach ($cart as $product): $total_to_be_purchased+=$product['quantity']*$product['Price']?>
                    <div class="row" id=<?='product_'.$product['ProductId']?> >
                        <div class="col-6 ">
                            <div class="row row-cus">
                                <div class="col-12 col-cus">
                                    <a class="btn btn-primary btn-deletion" id=<?= "btn_deletion_".$product['ProductId']?> onclick="update_cart(<?=$product['ProductId']?>,get_val('<?='quantity'.$product['ProductId']?>'),'null','delete')">X</a>
                                    <span class="title-product"><?php echo $product['ProductName']?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4"><img class="product_img" src="<?php echo $GLOBALS['base_url']."/assets/product_img/".$product['ImageLink']?>"></div>
                                <div class="col-8"></div>
                            </div>
                        </div>
                        <div class="col-6 tt-price">
                            <div class="row row-cus">
                                <div class="col-4 price col-cus"><script>document.write(convert_number(<?php echo $product['Price']?>))</script></div>
                                <div class="col-4 select-quantity col-cus">
                                    <div style="float: left;margin-left:35px;margin-top: -3px">
                                        <a class="btn btn-inc-dec" onclick="quantity_dec(<?= $product['ProductId']?>); update_cart(<?=$product['ProductId']?>, get_val('<?= 'quantity'.$product['ProductId']?>'),<?=$product['Price']?>)" > - </a>
                                    </div>
                                    <div style="float: left;padding-left:5px">
                                        <input id=<?php echo "quantity".$product['ProductId'] ?> value=<?= $product['quantity']?> class="quantity" >
                                    </div>
                                    <div style="float: left;padding-left:5px;margin-top: -3px;">
                                        <a class="btn btn-inc-dec" onclick="quantity_inc(<?= $product['ProductId']?>); update_cart(<?=$product['ProductId']?>, get_val('<?= 'quantity'.$product['ProductId']?>'),<?=$product['Price']?>)"> + </a>
                                    </div>
                                </div>
                                <div class="col-4 col-cus" >
                                    <input id=<?='tt_'.$product['ProductId']?> value='<?= $product['Price']*$product['quantity']?>'  class="tt" hidden>
                                    <span id=<?= 'tt_per_product_'.$product['ProductId']?>>
                                        <script>
                                            document.write(convert_number(<?= $product['Price']*$product['quantity']?>))
                                        </script>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;endif;?>
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <div class="row total-price">
                <div class="col-12">
                    <label><span style="font-weight: bold; color: #191919">TỔNG THÀNH TIỀN</span></label>
                    <br>
<!--                    <input id="ttt" class="ttt" value="--><?//= isset($total_to_be_purchased) ? $total_to_be_purchased : 0 ?><!--" hidden>-->
                    <label style="width: 150px">
                        <span id='ttt' class="ttt">
                        <?php if(isset($total_to_be_purchased)):?>
                            <script>document.write(convert_number(parseInt(<?=$total_to_be_purchased?>)))</script>
                        <?php else:?>
                            <script>document.write('0 VNĐ')</script>
                        <?php endif;?>
                    </span>
                    </label>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-order"  href="<?=$GLOBALS['base_url'].'/index.php/order/view_order' ?>">ĐẶT HÀNG</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</body>
<script>

    function get_val(element_id) {
        console.log(element_id);
        var ele=document.getElementById(element_id);
        console.log(ele.value);
        return ele.value;
    }

    function quantity_inc(product_id) {
        var ele=document.getElementById('quantity'.concat(product_id));
        ele.value = parseInt(ele.value)+1;
        //update total_cart
        var ele_total_cart=document.getElementById('total_cart');
        ele_total_cart.value=parseInt(ele_total_cart.value)+1;
    }

    function quantity_dec(product_id) {
        var ele=document.getElementById('quantity'.concat(product_id));
        if(ele.value != 1){
            ele.value = parseInt(ele.value)-1;
            //update total_cart
            var ele_total_cart=document.getElementById('total_cart');
            ele_total_cart.value=parseInt(ele_total_cart.value)-1;
        }
    }

    function update_cart(product_id, quantity, price, cmd) {
        console.log(price);
        console.log(quantity);

        //update tổng tiền của từng sản phẩm selected
        if(!isNaN(price) && quantity!=0){
            //update tổng tiền sp thay đổi
            var ele=document.getElementById('tt_'.concat(product_id));
            ele.value=quantity*price;
            document.getElementById('tt_per_product_'+product_id).innerHTML=convert_number(parseInt(quantity*price));
            //
        }else{
            //delete element
            var ele_to_be_deleted =document.getElementById('product_'.concat(product_id));
            ele_to_be_deleted.remove();
            //console.log(ele_to_be_deleted);
            //update cart
            var ele = document.getElementById('total_cart');
            ele.value-=quantity;
        }
        //update tổng thành tiền
        var ttt=0;//biến lưu tổng thành tiền
        var all_ele_tt=document.getElementsByClassName('tt');//get all input thành tiền của từng sp trong cart
        // console.log(all_ele_tt.length);
        if(all_ele_tt.length >0 ){
            var index=0;
            do{
                ttt +=parseInt(all_ele_tt[index].value);
                index++;
            }while(all_ele_tt[index]);
        }
        document.getElementById('ttt').innerHTML=convert_number(parseInt(ttt));

        //create form dynamically cover infor cart
        var f = document.createElement("form");
        f.setAttribute('id','f_cart');
        f.setAttribute('method',"post");
        f.setAttribute('action','<?=$GLOBALS['base_url'];?>'+'/index.php/Cart/add_product');
        f.setAttribute('target', 'transFrame');

        //create iframe to submit f_cart
        var iFrame=document.createElement('iframe');
        iFrame.setAttribute('name','transFrame');
        iFrame.setAttribute('id','transFrame');
        iFrame.setAttribute('style','display:none');

        var i = document.createElement("input"); //input element, text
        i.setAttribute('type',"text");
        i.setAttribute('name',"product_id");
        i.setAttribute('value',product_id);
        f.appendChild(i);

        var j = document.createElement("input"); //input element, Submit button
        j.setAttribute('type',"text");
        j.setAttribute('name',"quantity");
        j.setAttribute('value',quantity);
        f.appendChild(j);
        //neu click button delete thi se gui them lenh cmd = 'delete'
        if(cmd){
            if(cmd=='delete'){
                var k = document.createElement("input"); //input element, cmd
                k.setAttribute('type',"text");
                k.setAttribute('name',"cmd");
                k.setAttribute('value','delete');
                f.appendChild(k);
            }
        }
        //and some more input elements here
        //and dont forget to add a submit button
        document.getElementsByTagName('body')[0].appendChild(iFrame);
        document.getElementsByTagName('body')[0].appendChild(f);


        document.getElementById("f_cart").submit();

        //remove form
        document.getElementsByTagName('body')[0].removeChild(f);
        // document.getElementsByTagName('body')[0].removeChild(iFrame);
    }


</script>


<style>
    .total-price{
        float: right;
    }

    .title{
        background-color: #f1022a;
        border-right: 1px solid #c10130 ;
        height: 56px;
        text-align: center;
        font-size: 20px;
        color: white;
        line-height: 56px;
    }

    .title-product{
        margin-left: 50px;
        color: #191919;
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .price{
        color: #191919;
    }


    .tt{
        color: #f1022a !important;
        text-align: center; !important;
        height: 34px;
        width: 150px;
        background-color: #bbbbbb;
        border: none;
    }

    .product_img{
        max-width: 100%;
    }

    .quantity{
        width: 30px;
        height: 30px;
        text-align: center;
        border: 1px solid;
    }

    .btn-inc-dec{
        color: #191919 !important;
        width: 30px;
        height: 30px;
        padding: 0 !important;
        font-weight: bold !important;
        border: 1px solid black !important;
        border-radius: 0 !important;
        background-color: white;
    }

    .ttt{
        color: #f1022a;
        border: none;
        text-align: center;
        font-size: 20px;
        width: 150px;
    }

    .btn-order{
        width: 150px;
    }

    .tt-price{
        text-align: center ;
        font-size: 20px;
    }

    .select-quantity{
        padding-top: 2px;
        display: inline-block;
    }

    .btn-deletion{
        width: 30px;
        height: 30px;
        padding: 0 !important;
        display: inline-block;
        position: absolute;
        margin-top: 2px;
    }

    .col-cus{
        background-color: #bbbbbb;
    }

    .row-cus{
        height: 34px;
    }

</style>
</html>