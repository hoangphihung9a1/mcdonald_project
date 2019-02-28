<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/28/2019
 * Time: 12:13 AM
 */

class Home extends  CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('product_model');
        $this->load->helper('url');
        $this->load->model('Article_model');
    }
    public function home_page(){
        $menu_id=$this->input->get('menu_id');
        $this->load->model('menu_model');
        $menu=$this->menu_model->get($menu_id);

        $products=$this->product_model->get($menu_id);
        $data=array(
            'products'=>$products,
            'menu'=>(array)$menu
        );
        //load all menu
        $this->load->model('menu_model');
        $menus=$this->menu_model->get('');
        //get total_cart
        $total_cart=$this->session->userdata('total_cart');

        //load header
        $this->load->view('/shared/header',array('menus'=>$menus,
            'total_cart'=>$total_cart));
        $this->load->view('home_page');
        $this->load->view('/shared/footer');
    }

}
?>