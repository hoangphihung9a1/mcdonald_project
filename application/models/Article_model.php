<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/2019
 * Time: 9:57 CH
 */

class Article_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($article){
        $data = array(
            'Title' => $article['Title'],
            'Content' => $article['Content'],
            'ImageLink' => $article['ImageLink']
        );
        return $this->db->insert('article', $data);

    }

//    public function insert($article){
//        $sql = "INSERT INTO article( Title, Content, ImageLink ) VALUE ('".$article['Title']."' , '".$article['Content']."' , '".$article['ImageLink']."')";
//        $result = $this->db->query($sql);
//        return $result;
//    }
//123312313


    public function get_data(){

//        $sql = "SELECT * FROM article ORDER BY ArticleId LIMIT 0,2";
//        $result = $this->db->query($sql);
        $data = $this->db->select('*');
        $result = $this->db->get('article');
        return $result->result_array();




    }

    public function delete_data($data)
    {
        foreach ($data as $value)
        $this->db->where('ArticleId',$value);
        $this->db->delete('article');
        $result = $this->db->get('article');
        return $result;
    }


    public function edit_article($id,$data){
        $this->db->where('ArticleId',$id);
        $this->db->set('Title',$data['Title']);
        $this->db->set('Content',$data['Content']);
        $this->db->set('ImageLink',$data['ImageLink']);
        $result = $this->db->update('article');
        return $result;
    }

    public function list_article2(){
        $sql = "SELECT * FROM article ORDER BY ArticleId LIMIT 0,8 ";
        $result = $this->db->query($sql);
        return $result->result_array();

    }

    public function get_article($article_id){
        $sql = "SELECT * FROM article  WHERE ArticleId = '$article_id'";
        $result = $this->db->query($sql);
        return $result-> result_array();
    }

}
?>