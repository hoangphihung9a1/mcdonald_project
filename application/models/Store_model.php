<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 01/03/2019
 * Time: 10:21 AM
 */
class Store_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function getStore($input){
		$arg = array("StoreName" => $input['storeName'],
			"Password" => md5($input['password']));
		$this->db->select('StoreName, Password');
		$sql = $this->db->get_where('store', $arg)->result_array();
		return $sql;
	}

	public function addStore($input){
		$user = array(
			'StoreName' => $input['storeName'],
			'Password' => md5($input['password'])	,
			'Address' => $input['address']
		);
		$sql = $this->db->insert('store',$user);
		return $sql;
	}

	public function getExistStoreName($storeName){
		$sql = $this->db->get_where('store', array('StoreName' => $storeName))->result_array();
		return $sql;
	}
}
