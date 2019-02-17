<?php
/**
 * Created by PhpStorm.
 * User: Hung Hoang
 * Date: 2/16/2019
 * Time: 9:50 AM
 */
class Statistic_model extends CI_Model{
    public $LIMIT_PER_PAGE=2;

    public function __construct()
    {
        $this->load->database();
    }

    public function statistic_product($menuId, $page, $dateFrom, $dateTo){
        $skip=($page-1)*$this->LIMIT_PER_PAGE;
        // get all result -> total_page
        if($dateTo==''){
            $sql = "Select * from (SELECT ProductId, ProductName, Price from product where MenuId=$menuId) as T3 inner join (SELECT ProducId, Sum(Quantity) as Quantity from (SELECT OrderId from orders WHERE orders.OrderDate like '%$dateFrom%' ) as T1 INNER join orderdetail on T1.OrderId=orderdetail.OrderId group by ProducId) as T2 on T3.ProductId=T2.ProducId ";
        }else{
            $sql = "Select * from (SELECT ProductId, ProductName, Price from product where MenuId=$menuId) as T3 inner join (SELECT ProducId, Sum(Quantity) as Quantity from (SELECT OrderId from orders WHERE orders.OrderDate between '$dateFrom' and '$dateTo') as T1 INNER join orderdetail on T1.OrderId=orderdetail.OrderId group by ProducId) as T2 on T3.ProductId=T2.ProducId ";
        }
        $result = $this->db->query($sql);
        $total_page=ceil($result->num_rows()/$this->LIMIT_PER_PAGE);
        // get result by page
        $sql=$sql.'LIMIT '.$skip.",".$this->LIMIT_PER_PAGE;
        $result=$this->db->query($sql);

        return array($result->result_array(),$total_page);
    }
}