<html>
<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <script>
        function convert_number(num){
            return (num).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' VNĐ';
        }
    </script>
</header>

<body>
<form class="container" method="post" action="<?= $GLOBALS['base_url'] ?>/index.php/order/add_order">
    <div class="form-group">
        <label >Số Điện thoại</label>
        <input type="text" required name="customer_id" class="form-control" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
    </div>
    <div class="form-group">
        <label >Địa chỉ giao hàng</label>
        <input type="text" required name="shipping_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Cua hang</label>
        <select class="form-control" name="store_id" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>

        </select>
    </div>
    <div class="form-group">
        <label for="payment_method">Phương thức thanh toán</label>
        <select name="payment_method" class="form-control" id="exampleFormControlSelect1">
            <option value=1>Tiền mặt</option>
            <option value=2>Không phải tiền mặt</option>
        </select>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>


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

<!--                                <div style="float: left;padding-left:5px">-->
<!--                                    <input id=--><?php //echo "quantity".$product['ProductId'] ?><!-- value=--><?//= $product['quantity']?><!-- class="quantity" >-->
<!--                                </div>-->
                                <div style="float: left;margin-left:35px">
                                    <a class="btn btn-inc-dec" onclick="quantity_dec(<?= $product['ProductId']?>); update_cart(<?=$product['ProductId']?>, get_val('<?= 'quantity'.$product['ProductId']?>'),<?=$product['Price']?>)" > - </a>
                                </div>
                                <div style="float: left;padding-left:5px">
                                    <input id=<?php echo "quantity".$product['ProductId'] ?> value=<?= $product['quantity']?> class="quantity" >
                                </div>
                                <div style="float: left;padding-left:5px;">
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
                <a class="btn btn-primary btn-order" href="<?=$GLOBALS['base_url'].'/index.php/cart/view_cart' ?>">GIỎ HÀNG</a>
                <button class="btn btn-primary btn-order" type="submit">ĐẶT HÀNG</button>
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
</form>
<script>

    function get_val(element_id) {
        var ele=document.getElementById(element_id);
        return ele.value;
    }

    function quantity_inc(product_id) {
        var ele=document.getElementById('quantity'.concat(product_id));
        ele.value = parseInt(ele.value)+1;
        // //update total_cart
        // var ele_total_cart=document.getElementById('total_cart');
        // ele_total_cart.value=parseInt(ele_total_cart.value)+1;
    }

    function quantity_dec(product_id) {
        var ele=document.getElementById('quantity'.concat(product_id));
        if(ele.value != 1)
            ele.value = parseInt(ele.value)-1;
        // //update total_cart
        // var ele_total_cart=document.getElementById('total_cart');
        // ele_total_cart.value=parseInt(ele_total_cart.value)-1;
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
            // var ele = document.getElementById('total_cart');
            // ele.value-=quantity;
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
        f.setAttribute("target", "transFrame");

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

</body>
</html>