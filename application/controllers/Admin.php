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
        $this->load->model('order_model');
        $this->load->model('statistic_model');
        $this->load->model('store_model');
        $this->load->library('session');
        $this->load->helper('url');
        //check login
        $isLogin = $this->session->userdata('isLogin');
        if (is_null($isLogin)) {
            redirect($GLOBALS['base_url'] . '/index.php/user/login');
        }

    }


    public function list_order()
    {
//        if(isset($_GET['dateTo'])){
//            var_dump($_GET);
//            exit;
//        }
        //check type Admin then get store after that pass them to view
        if ($_SESSION['user']['Type'] == '0') {
            $store = (array)$this->store_model->get_store_by_id($_SESSION['user']['StoreId']);
//            var_dump($store);
//            exit;
            $stores = array();
            array_push($stores, $store);
        } else {
            $stores = $this->store_model->get_all_store();
        }


        //get order by $page && date
        if (isset($_GET['dateFrom'])) {
            // get tham so submit tu form
            $dateFrom = $_GET['dateFrom'];
            $storeId = $_GET['storeId'];

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else $page = 1;

            if ((is_null($_GET['dateTo']))) {
                $rs = $this->order_model->get_order($dateFrom, '', $page, $storeId);

            } else {
                $dateTo = $_GET['dateTo'];
                $rs = $this->order_model->get_order($dateFrom, $dateTo, $page, $storeId);
            }
            //load view list_order
            $this->load->view('orders', array('orders' => $rs[0],
                'total_page' => $rs[1],
                'stores' => $stores));
        } else {
            $this->load->view('orders.php', array('stores' => $stores));
        }

    }

    public function order_detail()
    {
        $order_id = $_GET['order_id'];
        $products = $this->order_model->get_products_id($order_id);

        //get product's name by product_id
        //load product_model
        $this->load->model('product_model');

        $i = 0;
        foreach ($products as $product) {
            $product_name = ($this->product_model->get_by_prd_id($product['ProducId']))[0]['ProductName'];
            $product['ProductName'] = $product_name;
            //update
            $products[$i] = $product;
            $i++;
        }

        $this->load->view('order_detail', array('products' => $products));
    }

//    public function count_total_page(){
//        $this->load->model('Order_model');
//        $total_page=$this->order_model->count_total_page();
//    }

    public function thongke_product()
    {
//        if(isset($_GET['dateFrom'])){
//            var_dump($_GET);
//            exit;
//        }

        //check type Admin then get store after that pass them to view
        if ($_SESSION['user']['Type'] == '0') {
            $store = (array)$this->store_model->get_store_by_id($_SESSION['user']['StoreId']);
            $stores = array();
            array_push($stores, $store);
        } else {
            $stores = $this->store_model->get_all_store();
        }

        //get all product by menuId && dateOrder
        if (isset($_GET['menu_id'])) {
            $menuId = $_GET['menu_id'];
            $page = $_GET['page'];
            $storeId = $_GET['storeId'];
            if (($_GET['dateTo']) != '') {

                $dateTo = $_GET['dateTo'];
                $dateFrom = $_GET['dateFrom'];
                $result = $this->statistic_model->statistic_product($menuId, $page, $dateFrom, $dateTo, $storeId);

            } else {
                $date = $_GET['dateFrom'];
                $result = $this->statistic_model->statistic_product($menuId, $page, $date, '', $storeId);
            }

        }
        //get all product
        $this->load->model('menu_model');
        $menus = $this->menu_model->get('');
        if (isset($result)) {
            $data = array(
                'menus' => $menus,
                'products' => $result[0],
                'total_page' => $result[1],
                'stores' => $stores
            );
        } else {
            $data = array('menus' => $menus,
                'stores' => $stores);
        }
        $this->load->view('thongke_product', $data);
    }


    public function homepage_view()
    {
        if (!isset($_GET['opt'])) {
            $this->load->view('homepage_admin');
        } else {
            $opt = $_GET['opt'];
            switch ($opt) {
                case 1:
                    redirect($GLOBALS['base_url'] . '/index.php/admin/list_order');
                    break;
                case 2:
                    redirect($GLOBALS['base_url'] . '/index.php/admin/thongke_product');
                    break;
                case 3:
                    redirect($GLOBALS['base_url'] . '/index.php/admin/quanli_menu');
                    break;
                case 4:
                    redirect($GLOBALS['base_url'] . '/index.php/admin/quanli_product');
                    break;
                case 5:
                    redirect($GLOBALS['base_url'] . '/index.php/admin/quanli_article');
                    break;
            }
        }
    }

    public function quanli_menu()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == '1') {
            $this->load->model('menu_model');
            $menus = $this->menu_model->get('');
            $this->load->view('quanli_menu', array('menus' => $menus));
        }else{
            redirect($GLOBALS['base_url'] . '/index.php/user/login');
        }
    }

    public function quanli_product()
    {

    }

    public function quanli_article()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == '1') {
            $this->load->model('article_model');
            $articles = $this->article_model->get_data();
            $this->load->view('list_article', array('articles' => $articles));
        }else{
            redirect($GLOBALS['base_url'] . '/index.php/user/login');
        }
    }

}

