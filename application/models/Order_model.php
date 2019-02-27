<?php
/**
 * Created by PhpStorm.
 * User: duong
 * Date: 26-Feb-19
 * Time: 12:17 PM
 */

class Order_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
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