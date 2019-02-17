<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 10:22 AM
 */
class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('statistic_model');
    }


    public function list_order(){
//        var_dump($_GET);
//        exit;
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else $page=1;
        //get order by $page && date
        if(isset($_GET['date'])) {
            $date = $_GET['date'];
        }else $date='';
        $rs=$this->order_model->get_order($date,$page);
        //load view list_order
        $this->load->view('orders',array('orders'=>$rs[0],
            'total_page'=>$rs[1]));
    }

    public function order_detail(){
        $order_id=$_GET['order_id'];
        $products=$this->order_model->get_products_id($order_id);

        //get product's name by product_id
        //load product_model
        $this->load->model('product_model');

        $i=0;
        foreach ($products as $product){
            $product_name=($this->product_model->get_by_prd_id($product['ProducId']))->ProductName;
            $product['ProductName']=$product_name;
            //update
            $products[$i]=$product;
            $i++;
        }

        $this->load->view('order_detail',array('products'=>$products));
    }

//    public function count_total_page(){
//        $this->load->model('Order_model');
//        $total_page=$this->order_model->count_total_page();
//    }

    public function thongke_product(){
//        if(isset($_GET['dateFrom'])){
//            var_dump($_GET);
//            exit;
//        }

        //get all product by menuId && dateOrder
        if(isset($_GET['menu_id'])){
            $menuId=$_GET['menu_id'];
            $page=$_GET['page'];
            if(($_GET['dateTo'])!=''){

                $dateTo=$_GET['dateTo'];
                $dateFrom=$_GET['dateFrom'];
                $result = $this->statistic_model->statistic_product($menuId,$page,$dateFrom,$dateTo);

            }else{
                $date=$_GET['dateFrom'];
                $result = $this->statistic_model->statistic_product($menuId,$page,$date,'');
            }

        }
        //get all product
        $this->load->model('menu_model');
        $menus=$this->menu_model->get('');
        if(isset($result)){
            $data=array(
                'menus'=>$menus,
                'products'=>$result[0],
                'total_page'=>$result[1]
            );
        }else{
            $data=array('menus'=>$menus);
        }
        $this->load->view('thongke_product',$data);
    }
}