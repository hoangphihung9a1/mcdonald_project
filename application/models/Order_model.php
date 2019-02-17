<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 1/22/2019
 * Time: 8:57 PM
 */
class Order_model extends CI_Model{

    public $LIMIT_PER_PAGE=10;

    public function __construct()
    {
        $this->load->database();
    }

    public function get_order($date,$page){
        $skip=($page-1)*$this->LIMIT_PER_PAGE;
        if($date!==''){
            //count total result => total_page
            $this->db->like('OrderDate',$date);
            $total_page=ceil($this->db->count_all_results('orders')/$this->LIMIT_PER_PAGE);
            //get order
            $this->db->like('OrderDate',$date);
            $orders=$this->db->get('orders',$this->LIMIT_PER_PAGE,$skip);
        } else{
            $orders=$this->db->get('orders',$this->LIMIT_PER_PAGE,$skip);
            $total_page=ceil(($this->db->count_all('orders'))/$this->LIMIT_PER_PAGE);
        }

        $rs=array($orders->result_array(),$total_page);
        return $rs;
    }

    public function get_products_id($order_id){
        return $this->db->get_where('orderdetail',array('OrderId'=>$order_id))->result_array();
    }

    public function count_total_page(){

    }
}