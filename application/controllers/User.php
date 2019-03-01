<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/02/2019
 * Time: 5:12 PM
 */
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function login(){
		$input = $this->input->post();
		if ($input == NULL){
			$this->load->view("login");
		}
		else{
			$this->load->model('user_model');
			$result = $this->user_model->getUser($input);
			if (count($result)){
				$userAddress = $this->user_model->getUserAddress($result[0]['CustomerId']);
				$this->session->userdata($userAddress);
				echo 'Logged';
				//echo $result[0]['CustomerId'];
			}
			else $this->load->view("login");
		}
	}

	public function register(){
		$input = $this->input->post();
		if ($input == NULL){
			$this->load->view("register");
		}
		else{
			$this->load->model('user_model');
			if(count($this->user_model->getExistAccountName($input['username'])) >= 1){
				$this->load->view("register");
				return;
			}
			if ($input['password'] != $input['confirmedPassword']) {
				$this->load->view("register");
				return;
			}
			$result = $this->user_model->addUser($input);
			if ($result) $this->load->view("login");
			else $this->load->view("register");
		}
	}
}
