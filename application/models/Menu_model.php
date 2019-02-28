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

    public function delete_menu($menu_id)
    {
        $this->db->where('MenuId', $menu_id);
        $result=$this->db->delete('menu');
        return $result;
    }

    public function edit_menu($menu){
        $this->db->set('MenuName',$menu['MenuName']);
        $this->db->where('MenuId',$menu['MenuId']);
        $rs=$this->db->update('menu');
        return $rs;
    }
}