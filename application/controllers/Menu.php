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
    }

    public function add_menu(){
        $input=$this->input->post();
        if($input==NULL){
            $this->load->view('add_menu');
        }else{
            $rs=$this->Menu_model->add_menu($input['menu_name']);
            if($rs){
                redirect($GLOBALS['base_url'].'/index.php/admin/homepage_view');
            }else {
                $this->load->view('add_menu');
            }
        }
    }

    public function get(){
        $this->menu_model->get();
    }
}