<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<html>
<body>
    <div class="container">
        <div class="row">
            <p class="menu-name"><?php echo $menu['MenuName']?></p>
            <?php foreach ($products as $product):?>
                <div id=<?php echo $product['ProductId']?> class="col-md-3" onmouseover="visible_bgd(this)" onmouseout="disable_bgd(this)">
                    <a>
                        <img class="product_img" src=<?php echo $GLOBALS['base_url']."/assets/product_img/".$product['ImageLink']?>>
                        <p class="infor_product">
                            <?php echo $product['ProductName'] ?>
                            <br>
                            <b><?php echo $product['Price'] ?></b>
                        </p>
                        <button id=<?php echo 'btn_view_detail_'.$product['ProductId']?> class="view_detail_product" data-toggle="modal" data-target="#exampleModalCenter" onclick="click_modal('<?php echo $product['ProductId']?>','<?php echo $product['ProductName']?>','<?php echo $product['Price']?>','<?php echo $product['ImageLink']?>')" >CHỌN</button>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-cus" role="document" >
            <div class="modal-content">
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
                <div class="modal-body">
                    <div class="row row-1">
                        <div class="col-md-5">
                            <img id="modal-productImg" style="max-width: 100%" value="">
                        </div>
                        <div class="col-md-7">
                            <span class="popup-title-prd" id="modal-productName" value=""></span>
                            <br>
                            <div class="row option">
 
                            </div>
                            <div class="row quantity-price">
                                <div class="col-12 ">
                                    <span style="font-weight: bold; font-size: 20px">SỐ LƯỢNG:</span>
                                    <a class="btn btn-inc" onclick="quantity_dec()">-</a>
                                    <input class="quantity" id="quantity" type="text" value="1">
                                    <a class="btn btn-inc" onclick="quantity_inc()">+</a>
                                    <a id="modal-price" class="price" ></a>

                                </div>
                            </div>
                            <input id="modal-productId" value="" hidden>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn_dismiss_modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="add_to_cart(get_val('modal-productId'),get_val('quantity'))">THÊM VÀO GIỎ HÀNG</button>
                </div>
            </div>
        </div>
    </div>


    <script>

        function get_val(element_id) {
            var ele=document.getElementById(element_id);
            return ele.value;
        }

        function quantity_inc() {
            var ele=document.getElementById('quantity');
            ele.value = parseInt(ele.value)+1;
        }

        function quantity_dec() {
            var ele=document.getElementById('quantity');
            if(ele.value != 1)
                ele.value = parseInt(ele.value)-1;

        }
        function visible_bgd(x) {
            x.style.background='#bd0017';
            var parent_id=x.id;
            var str_temp='btn_view_detail_';
            var ele_child_id=str_temp.concat(parent_id);
            ele=document.getElementById(ele_child_id);
            ele.style.display='block';

        }
        function disable_bgd(x) {
            x.style.background='transparent';
            var parent_id=x.id;
            var str_temp='btn_view_detail_';
            var ele_child_id=str_temp.concat(parent_id);
            ele=document.getElementById(ele_child_id);
            ele.style.display='none';
        }


       function add_to_cart(product_id, quantity) {
           //create form dyamically cover infor cart
           var f = document.createElement("form");
           f.setAttribute('id','f_cart');
           f.setAttribute('method',"post");
           f.setAttribute('action','http://localhost:8080/demo/McDonald\'s/index.php/Cart/add_product');
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

           //reset value quantity
           document.getElementById('quantity').value=1;

           //dissmiss modal
           var ele=document.getElementById('btn_dismiss_modal');
           ele.click();
       }

        function click_modal(productId, productName, price, productImg) {
            document.getElementById("modal-productName").innerHTML = productName;
            document.getElementById("modal-productId").setAttribute('value',productId);
            document.getElementById("modal-price").innerHTML = price;
            document.getElementById('modal-productImg').setAttribute('src','http://localhost:8080/demo/McDonald\'s/assets/product_img/'.concat(productImg));
        }
    </script>


</body>
<style>
    .product_img{
        width: 250px;
        height: 250px;
    }

    .infor_product{
        text-align: center;
    }

    .view_detail_product{
        display: none;
        background-color: red;
        color: #ffffff !important;
        font-size: 15px;
        border-radius: 15px;
        width: 200px;
        height: 40px;
        text-align: center;
        padding-top: 5px;
        margin-left: 27.5px;
        text-decoration: none !important;
    }

    .col-md-3{
        height: 400px;
    }

    .menu-name{
        margin-top: 20px;
        color: #888888;
        font-family: Cambria;
        font-size: 30px;
        width:100%;
    }

    .modal-dialog-cus{
        max-width: 60% !important;
    }

    .popup-title-prd{
        color: #e4002b;
        font-size: 25px;
        text-transform: uppercase;
        font-weight: bolder;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-inc{
        height: 30px;
        width: 30px;
        background-color: #a4a4a4;
        border-radius: 0 !important;
        text-align: center !important;
        padding: 0 !important;
        font-weight: bold !important;
    }

    .quantity-price{
        position: absolute;
        bottom: 40px;
    }

    .quantity{
        width: 30px;
        height: 30px;
        text-align: center;
        background-color: #bd0017;
        color: white;
        font-weight: bold;
        border: none ;
    }

    .price{
        color: #bd0017;

        font-size: 20px;
    }

    .option{

    }
</style>
</html>
