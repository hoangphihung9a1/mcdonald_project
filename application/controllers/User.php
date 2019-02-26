<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 2/19/2019
 * Time: 4:26 PM
 */
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function login(){
        $user_post=$this->input->post();
//        var_dump($user_post);
//        exit;
        if($user_post==null){
            $this->load->view('login');
        }else{
            $user_post=array(
                'username'=>$this->input->post('username'),
                'password_hash'=>md5($this->input->post('password'))
            );

            $result=$this->user_model->get_user($user_post);

            if($result){
                $this->session->set_userdata('isLogin',true);
                $this->session->set_userdata('user',(array)$result);
                if($_SESSION['user']['Type']!='normal'){
                    redirect($GLOBALS['base_url'].'/index.php/admin/homepage_view');
                }
            } else {
                $this->load->view('login');
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('isLogin');
        $this->session->unset_userdata('user');
        redirect($GLOBALS['base_url'].'/index.php/user/login');
    }
}