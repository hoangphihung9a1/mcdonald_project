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
//        var_dump($_POST);
//        exit;
        if($cart==NULL) {
            $cart =array();
        }
        $new_product_selected=array(
            'product_id'=>$this->input->post('product_id'),
            'quantity'=>$this->input->post('quantity')
        );

        $cmd=$this->input->post('cmd');// tên lênh
        //nếu quantity = 0 thì xóa product khỏi cart else update normal
        if($cmd=='delete'){
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
                    //$new_product_selected['quantity']=$product_selected['quantity']; //update quantity if match product_id
                    if(isset($cmd) && $cmd=='add'){
                        $new_product_selected['quantity']+=$product_selected['quantity'];//add thêm quantity vào sản phẩm đã chọn
                    }
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
        //set total_cart
        $total_cart=0;
        if($cart!=NULL){
            foreach ($cart as $product){
                $total_cart+=$product['quantity'];
            }
        }
        $_SESSION['total_cart']=$total_cart;
    }

    public function delete_cart(){
        $this->session->unset_userdata('cart');

    }

    public function view_cart(){
        //get all menu & total_cart after that pass to header view
        $this->load->model('menu_model');
        $menus=$this->menu_model->get('');
        //get total_cart
        $total_cart=$this->session->userdata('total_cart');
        $this->load->view('/shared/header',array(
            'menus'=>$menus,
            'total_cart'=>$total_cart
        ));
        //load promotion
        $this->load->view('promotion');
        // get all selected product's infor in cart
        $cart=$this->session->userdata('cart');
        if($cart!=NULL) {
            $this->load->model('product_model');
            $i = 0;
            foreach ($cart as $product) {
                $product_detail = $this->product_model->get_by_prd_id($product['product_id']);

                $product_detail[0]['quantity'] = $product['quantity'];
                $cart[$i] = $product_detail[0];
                $i++;
            }
            //var_dump($cart);

            $this->load->view('cart', array('cart'=>$cart));
        }else {
            $this->load->view('cart');
        }

        //load footer view
        $this->load->view('/shared/footer');
    }


}
