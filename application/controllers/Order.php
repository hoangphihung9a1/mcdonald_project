<?php
/**
 * Created by PhpStorm.
 * User: duong
 * Date: 26-Feb-19
 * Time: 12:13 PM
 */

class Order extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('order_model');

    }

    public function view_order(){

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

            $this->load->view('add_order', array('cart'=>$cart));
        }else {
            $this->load->view('add_order');
        }

    }

    public function add_order(){
        $this->load->helper('date');
        $cart=$this->session->userdata('cart');
        $status=0;
        $this->load->model('Order_model');

        $input=$this->input->post();
        if($input==NULL){
            $this->load->view('view_order');
        }else{
            $order=array(
                'customer_id'=>$this->input->post('customer_id'),
                'store_id'=>$this->input->post('store_id'),
                'date'=>date(DATE_ATOM, time()),
                'S_Address'=>$this->input->post('shipping_address'),
                'PayMethod'=>$this->input->post('payment_method'),
                'coupon'=>$this->input->post('coupon'),
                'money'=>0,
                'payment_method'=>$this->input->post('payment_method'),
                'status'=>$status,
                );

           $rs=$this->order_model->insert_order($order);
           $lastid = $this->db->insert_id();
            if($rs){
                if($cart!=NULL) {
                    $this->load->model('product_model');
                    $i = 0;
                    $temp_money=0;
                    foreach ($cart as $product) {

                        $product_detail = $this->product_model->get_by_prd_id($product['product_id']);
                        $product_detail[0]['quantity'] = $product['quantity'];
                        $cart[$i] = $product_detail[0];

                        $order_detail=array(
                            'order_id'=>$lastid,
                            'product_id'=>$cart[$i]['ProductId'],
                            'quantity'=>$cart[$i]['quantity'],
                        );
                        $temp_money=$temp_money+(intval($cart[$i]['Price']))*intval($cart[$i]['quantity']);

                        $this->order_model->insert_order_detail($order_detail);
                        $i++;
                    }

                    $data_change=array(
                        'TotalMoney' => $temp_money
                    );
                    $this->db->where('OrderId', $lastid);
                    $this->db->update('orders', $data_change);
                    $this->session->unset_userdata('cart');
                    $this->session->unset_userdata('total_cart');
                }else {
                    echo "Khong co san pham";
                }

                redirect($GLOBALS['base_url'].'/index.php/cart/view_cart');
            }else {
                echo "error";
                exit;
            }
            }


    }
}