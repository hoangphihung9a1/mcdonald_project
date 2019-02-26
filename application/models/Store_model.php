<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 2/18/2019
 * Time: 9:24 AM
 */
class Store_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_store(){
        $this->db->select('*');
        $rs=$this->db->get('store');
        return $rs->result_array();
    }

    public function get_store_by_id($storeId){
        $this->db->select('*');
        $rs=$this->db->get_where('store',array('StoreId'=>$storeId));
        return $rs->first_row();
    }
}