<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/21/2018
 * Time: 4:47 PM
 */
class Cart extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

    }

    public function add_product(){
        //var_dump($_POST);
        //redirect($GLOBALS['base_url'].'/index.php/product/list_product');
        $cart=$this->session->userdata('cart');
//        var_dump($cart);
//        exit;
        if($cart==NULL) {
            $cart =array();
        }
        $new_product_selected=$this->input->post();
//        var_dump($new_product_selected);
//        exit;
        //nếu quantity = 0 thì xóa product khỏi cart else update normal
        if($new_product_selected['quantity']==0){
            $product_id_to_be_deleted=$new_product_selected['product_id'];
            $i=0;
            foreach ($cart as $product_selected){
                if($product_id_to_be_deleted==$product_selected['product_id']){
                    unset($cart[$i]);
                    break;
                }
                $i++;
            }
            $cart=array_values($cart);//reindexing
        } else {
            $isExisted=false;
            $i=0;
            foreach ($cart as $product_selected){
                if($product_selected['product_id']==$new_product_selected['product_id']){
                    $cart[$i]=$new_product_selected;
                    $isExisted=true;
                    break;
                }
                $i++;
            }

            if(!$isExisted){
                array_push($cart,$new_product_selected);
            }
        }
        $_SESSION['cart']=$cart;
        //var_dump($cart);

    }

    public function delete_cart(){
        $this->session->unset_userdata('cart');

    }

    public function view_cart(){
        $cart=$this->session->userdata('cart');
        $this->load->model('product_model');
        $i=0;
        foreach ($cart as $product){
            $product_detail=$this->product_model->get_by_prd_id($product['product_id']);
            $product_detail[0]['quantity']=$product['quantity'];
            $cart[$i]=$product_detail[0];
            $i++;
        }
        //var_dump($cart);
        $cart_box=array('cart'=>$cart);
        $this->load->view('cart',$cart_box);
    }


}