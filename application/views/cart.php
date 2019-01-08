<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<html>
<body class="container">
    <div class="title">
        <div class="row">
            <div class="col-6">THÔNG TIN SẢN PHẨM</div>
            <div class="col-2">ĐƠN GIÁ</div>
            <div class="col-2">SỐ LƯỢNG</div>
            <div class="col-2">THÀNH TIỀN</div>
        </div>
    </div>


    <div id="cart" class="container-fluid">
        <?php $total_to_be_purchased=0;
        foreach ($cart as $product): $total_to_be_purchased+=$product['quantity']*$product['Price']?>
            <div class="row" id=<?='product_'.$product['ProductId']?> >
                <div class="col-6 ">
                    <div class="row ">
                        <div class="col-12 col-cus">
                            <a class="btn btn-primary btn-deletion" id=<?= "btn_deletion_".$product['ProductId']?> onclick="update_cart(<?=$product['ProductId']?>,0)">X</a>
                            <span class="title-product"><?php echo $product['ProductName']?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"><img class="product_img" src="<?php echo $GLOBALS['base_url']."/assets/product_img/".$product['ImageLink']?>"></div>
                        <div class="col-8"></div>
                    </div>
                </div>
                <div class="col-6 tt-price">
                    <div class="row ">
                        <div class="col-4 price col-cus"><?php echo $product['Price']?></div>
                        <div class="col-4 select-quantity col-cus">
                            <a class="btn btn-inc-dec" onclick="quantity_dec(<?= $product['ProductId']?>); update_cart(<?=$product['ProductId']?>, get_val('<?= 'quantity'.$product['ProductId']?>'),<?=$product['Price']?>)" > - </a>
                            <input id=<?php echo "quantity".$product['ProductId'] ?> value=<?= $product['quantity']?> class="quantity" >
                            <a class="btn btn-inc-dec" onclick="quantity_inc(<?= $product['ProductId']?>); update_cart(<?=$product['ProductId']?>, get_val('<?= 'quantity'.$product['ProductId']?>'),<?=$product['Price']?>)"> + </a>
                        </div>
                        <div class="col-4 col-cus" >
                            <input id=<?='tt_'.$product['ProductId']?> value="<?= $product['Price']*$product['quantity']?>" class="tt" >
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row total-price">
            <div class="col-12">
                <label><span style="font-weight: bold; color: #191919">TỔNG THÀNH TIỀN</span></label>
                <br>
                <input id="ttt" class="ttt" value=<?=$total_to_be_purchased?> >
                <br>
                <br>
                <a class="btn btn-primary btn-order">ĐẶT HÀNG</a>
            </div>
        </div>
    </div>

    <script>

        function get_val(element_id) {
            var ele=document.getElementById(element_id);
            return ele.value;
        }

        function quantity_inc(product_id) {
            var ele=document.getElementById('quantity'.concat(product_id));
            ele.value = parseInt(ele.value)+1;
        }

        function quantity_dec(product_id) {
            var ele=document.getElementById('quantity'.concat(product_id));
            if(ele.value != 1)
                ele.value = parseInt(ele.value)-1;

        }

        function update_cart(product_id, quantity, price) {
            //update tổng tiền của từng sản phẩm selected
            if(!isNaN(price)){
                //update tổng tiền sp thay đổi
                document.getElementById('tt_'.concat(product_id)).value=quantity*price;
            }else{
                //delete element
                var ele_to_be_deleted =document.getElementById('product_'.concat(product_id));
                ele_to_be_deleted.remove();
                //console.log(ele_to_be_deleted);
            }
            //update tổng thành tiền
            var ttt=0;//biến lưu tổng thành tiền
            var all_ele_tt=document.getElementsByClassName('tt');//get all input thành tiền của từng sp trong cart
            console.log(all_ele_tt.length);
            if(all_ele_tt.length >0 ){
                var index=0;
                do{
                    ttt +=parseInt(all_ele_tt[index].value);
                    index++;
                }while(all_ele_tt[index]);
            }
            document.getElementById('ttt').value=ttt;

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
            margin-left: 30px;
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
            border: 1px solid ;
            border-radius: 0;
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
        }

        .btn-deletion{
            width: 30px;
            height: 30px;
            padding: 0;
            display: inline-block;
        }

        .col-cus{
            background-color: #bbbbbb;
        }

    </style>
</body>
</html>