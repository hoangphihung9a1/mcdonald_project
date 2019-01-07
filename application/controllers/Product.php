<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 2:41 PM
 */
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function add_product(){
        $this->load->model('menu_model');
        $menus=$this->menu_model->get('');
        //
        $input=$this->input->post();
        if($input!=NULL){
            $product=array(
                'name'=>$this->input->post('product_name'),
                'price'=>$this->input->post('product_price'),
                'img_link'=>$this->input->post('product_img_link'),
                'menu_id'=>$this->input->post('menu_id'),
                'describe'=>$this->input->post('product_describe')
            );
            $rs=$this->product_model->insert($product);
            if($rs){
                //redirect('http://localhost:8080/demo/ci/index.php/admin/homepage_view');
                echo 'successful';
            }else{
                $this->load->view('add_article',array(
                    'menus'=>$menus
                ));
            }
        }else{
            $this->load->view('add_product',array(
                'menus'=>$menus
            ));
        }
    }

    public function list_product(){
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
        //load header
        $this->load->view('/shared/header',array('menus'=>$menus));
        $this->load->view('promotion');
        //
        $this->load->view('list_product',$data);
        //load footer
        $this->load->view('/shared/footer');
    }
}