<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 11:26 AM
 */
class Menu_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_menu($menu_name){

        $data=array(
            'MenuName'=> $menu_name
        );
        $sql=$this->db->insert('menu',$data);
        return $sql;
    }

    public function get($criteria){
        if($criteria==''){
            $this->db->select('*');
            return $this->db->get('menu')->result_array();
        }else{
            $data=array('MenuId'=>$criteria);
            return $this->db->get_where('menu',$data)->first_row();
        }
    }
}