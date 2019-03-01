<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/02/2019
 * Time: 9:41 AM
 */
class User_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	public function getUser($input){
		$arg = array("AccountName" => $input['username'],
					"AccountPassword" => md5($input['password']));
		$this->db->select('AccountName, AccountPassword, CustomerId');
		$sql = $this->db->get_where('account', $arg)->result_array();
		return $sql;
	}

	public function addUser($input){
		$user = array(
			'CustomerName' => $input['fullname'],
			'phoneNumber' => $input['phoneNumber'],
			'email' => $input['email'],
			'address' => $input['address']
		);
		$sql = $this->db->insert('customer',$user);
		if ($sql){

			$account = array(
				'accountName' => $input['username'],
				'accountPassword' => md5($input['password']),
				'customerId' => $this->getMaxCustomerId()
			);
			$sql1 = $this->db->insert('account',$account);
		}
		return $sql1;
	}
	public function getMaxCustomerId(){
		$this->db->select_max('CustomerId');
		$sql = $this->db->get('customer')->result_array();
		return $sql[0]['CustomerId'];
	}

	public function getExistAccountName($accountName){
		$sql = $this->db->get_where('account', array('AccountName' => $accountName))->result_array();
		return $sql;
	}

	public function getUserAddress($customerId){
		$arg = array('CustomerId' => $customerId);
		$this->db->select('Address');
		$sql = $this->db->get_where('customer', $arg)->result_array();
		return $sql[0]['Address'];
	}
}
