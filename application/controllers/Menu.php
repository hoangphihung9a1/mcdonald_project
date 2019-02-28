<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 11:05 AM
 */
class Menu extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Menu_model');
        $isLogin = $this->session->userdata('isLogin');
        $typeAdmin=($this->session->userdata('user'))['Type'];
        if (is_null($isLogin)||$typeAdmin!='1') {
            redirect($GLOBALS['base_url'] . '/index.php/user/login');
        }
    }

    public function add_menu(){

        $input=$this->input->post();
        if($input==NULL){
            $this->load->view('add_menu');
        }else{
            $rs=$this->Menu_model->add_menu($input['menu_name']);
            if($rs){
                redirect($GLOBALS['base_url'].'/index.php/admin/quanli_menu');
            }else {
                $this->load->view('add_menu');
            }
        }
    }

    public function edit_menu(){
        $menu_id=$_POST['menu_id'];
        $menu=$this->Menu_model->get($menu_id);
        if(isset($_POST['menu_name_new'])){
            $menu=array(
                'MenuId'=>$_POST['menu_id'],
                'MenuName'=>$_POST['menu_name_new']
            );

            $rs=$this->Menu_model->edit_menu($menu);
            if ($rs){
                redirect($GLOBALS['base_url'].'/index.php/admin/quanli_menu');
            }else{
                $this->load->view('edit_menu',array('menu'=>(array)$menu));
            }
        }else{
            $this->load->view('edit_menu',array('menu'=>(array)$menu));
        }
    }

    public function delete_menu()
    {
        $menu_id=$_POST['menu_id'];
        $rs=$this->Menu_model->delete_menu($menu_id);

        if($rs){
            redirect($GLOBALS['base_url'].'/index.php/admin/quanli_menu');
        }else{
            echo 'Xoa khong thanh cong';
        }

    }
}