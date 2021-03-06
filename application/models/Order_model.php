<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 1/22/2019
 * Time: 8:57 PM
 */
class Order_model extends CI_Model{

    public $LIMIT_PER_PAGE=2;

    public function __construct()
    {
        $this->load->database();
    }

    public function get_order($dateFrom, $dateTo, $page, $storeId){
        $skip=($page-1)*$this->LIMIT_PER_PAGE;
        if($dateTo==''){
            //count total result => total_page
            $this->db->like('OrderDate',$dateFrom);
            $this->db->where('StoreId',$storeId);
            $total_page=ceil($this->db->count_all_results('orders')/$this->LIMIT_PER_PAGE);
            //get order
            $this->db->like('OrderDate',$dateFrom);
            $this->db->where('StoreId',$storeId);
            $orders=$this->db->get('orders',$this->LIMIT_PER_PAGE,$skip);
        } else{
            //count total_result ->total_page
            $this->db->where('StoreId',$storeId);
            $this->db->where('OrderDate Between "'.$dateFrom.'" AND "'.$dateTo.'"');
            $total_page=ceil(($this->db->count_all_results('orders'))/$this->LIMIT_PER_PAGE);
            //get order by limit
            $this->db->where('StoreId',$storeId);
            $this->db->where('OrderDate Between "'.$dateFrom.'" AND "'.$dateTo.'"');
            $orders=$this->db->get('orders',$this->LIMIT_PER_PAGE,$skip);
        }
//        var_dump($orders->result_array());
//        var_dump($total_page);
//        exit;
        $rs=array($orders->result_array(),$total_page);
        return $rs;
    }

    public function get_products_id($order_id){
        return $this->db->get_where('orderdetail',array('OrderId'=>$order_id))->result_array();
    }


    public function insert_order($order){
        $data=array(
            'CustomerId'=>$order['customer_id'],
            'StoreId'=>$order['store_id'],
            'OrderDate'=>$order['date'],
            'ShippingAddress'=>$order['S_Address'],
            'Coupon'=>$order['coupon'],
            'TotalMoney'=>$order['money'],
            'PayMethod'=>$order['payment_method'],
            'StatusId'=>$order['status']
        );
        return $this->db->insert('orders',$data);
    }

    public function insert_order_detail($order_detail){
        $data=array(
            'OrderId'=>$order_detail['order_id'],
            'ProducId'=>$order_detail['product_id'],
            'Quantity'=>$order_detail['quantity'],
        );
        return $this->db->insert('orderdetail',$data);
    }
}