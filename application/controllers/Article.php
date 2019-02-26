<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/2019
 * Time: 9:56 CH
 */
class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('product_model');
        $this->load->helper('url');
        $this->load->model('Article_model');

    }

    public function add_article()
    {
//        $input = $this->inputs('');
        $input=$this->input->post();
        if ($input) {
            $article = array(
                'Title' => $this->input->post('Title'),
                'Content' => $this->input->post('Content'),
                'ImageLink' => $this->input->post('ImageLink'),
            );
            $result = $this->Article_model->insert($article);
            if ($result){
                if (isset($_POST['Content'])){
                    $article = $_POST['Content'];
                }else{
                    echo 'Lỗi';
                }
                redirect('http://localhost:80/mcdonald_project/index.php/Article/list_article');
            }else{
                $this->load->view('add_article');
            }
        }else{
            $this->load->view('add_article');
        }
    }

    public function list_article(){
        $data = $this->Article_model->get_data();
        $article = array("articles" =>$data);
        $this->load->view('list_article', $article);
    }

    public function delete_article()
    {
        $this->Article_model->delete_data($_POST);

        $data = $this->Article_model->get_data();
        $article = array("articles"=>$data);
        $this->load->view("list_article", $article);
    }

    public function edit_article(){
        $article = array();
        $article_id = $_GET['id'];
        if(isset($_GET['Title'])){
            $data = array(
                'Title' => $_GET['Title'],
                'Content' => $_GET['Content'],
                'ImageLink'=> $_GET['ImageLink']
            );
            $article = $this->Article_model->edit_article($article_id,$data);
            redirect($GLOBALS['base_url'].'/index.php/Article/list_article');
        }else{
            $articles = $this->Article_model->get_article($article_id);
            $this->load->view('edit_article',array(
                'article'=>$articles
            ));
        }


//        $data = array(
//            'Title' => $_GET['Title'],
//            'Content' => $_GET['Content'],
//            'ImageLink'=> $_GET['ImageLink']
//        );

//        $article = $this->Article_model->edit_article($article_id,$data);
//
//        $this->load->view('edit_article',$article);
    }



    public function list_article2(){
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

        $data = $this->Article_model->list_article2(1);
        $article1 = array("articles1" =>$data);

//        $load = $this->Article_model->get_data();
//        $Article = array(
//            "Articles" => $load
//        );
        $this->load->view('list_article2', $article1);
        $this->load->view('/shared/footer');
    }

    public function news(){
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
        $article_id = $_GET['id'];
        $article = $this->Article_model->get_article($article_id);



//       var_dump($id); exit;
//        $data = $this->Article_model->get_data();
        $articles = $this->Article_model->get_data();
        $article1 = array("article1"=>$article,"articles2"=>$articles);
        $this->load->view('news',$article1);
        $this->load->view('/shared/footer');






    }



}
?>