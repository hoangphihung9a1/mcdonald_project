<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/12/2018
 * Time: 8:20 AM
 */
class Page extends CI_Controller{
    public function load_page(){
        $input=$this->input->get('page');
        $this->load->model('menu_model');
        $menus=$this->menu_model->get('');
        if($input=='header'){
            $this->load->view('/shared/'.$input,array('menus'=>$menus));
        }else{
            $this->load->view('/shared/'.$input);

        }
    }
}