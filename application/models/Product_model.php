<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 3:26 PM
 */
class Product_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert($product){
        $data=array(
            'MenuId'=>$product['menu_id'],
            'ProductName'=>$product['name'],
            'Price'=>$product['price'],
            'ProductDescribe'=>$product['describe'],
            'ImageLink'=>$product['img_link']
        );
        return $this->db->insert('product',$data);
    }

    public function get($criteria)
    {
        if ($criteria == NULL) {
            $this->db->select('*');
            return $this->db->get('product')->result_array();
        }else{
            $data=array('MenuId'=>$criteria);
            return $this->db->get_where('product',$data)->result_array();
        }
    }

    public function get_by_prd_id($product_id){
        $data=array('ProductId'=>$product_id);
        return $this->db->get_where('product',$data)->first_row();
    }
}