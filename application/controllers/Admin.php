<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 12/11/2018
 * Time: 10:22 AM
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

    public function login(){
		$input = $this->input->post();
		if ($input == NULL){
			$this->load->view("store_login");
		}
		else{
			$this->load->model('store_model');
			$result = $this->store_model->getStore($input);
			if (count($result)){
				echo 'Logged';
				//echo $result[0]['CustomerId'];
			}
			else $this->load->view("store_login");
		}
	}

	public function register(){
		$input = $this->input->post();
		if ($input == NULL){
			$this->load->view("store_register");
		}
		else{
			$this->load->model('store_model');
			if(count($this->store_model->getExistStoreName($input['storeName'])) >= 1){
				$this->load->view("store_register");
				return;
			}
			if ($input['password'] != $input['confirmedPassword']) {
				$this->load->view("store_register");
				return;
			}
			$result = $this->store_model->addStore($input);
			if ($result) echo "Registered";
			else $this->load->view("store_register");
		}
	}
}
