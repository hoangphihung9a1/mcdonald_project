<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 2/19/2019
 * Time: 4:37 PM
 */
class User_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($user_post){
        $condition=array('Name'=>$user_post['username'],
            'Password'=>$user_post['password_hash']);
        $rs=$this->db->get_where('admin',$condition);
        return $rs->first_row();
    }
}