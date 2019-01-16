<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor_model extends CI_Model{
    public function get_doctors(){
        return $this->db->get('doctor')->result();
    }
    public function add_doctors($name,$time,$desc,$goal,$special,$image){
        $data = array(
            'doctor_name' => $name,
            'doctor_job' => $time,
            'doctor_message' => $desc,
            'doctor_place' => $goal,
            'doctor_special' => $special,
            'doctor_image' => $image
        );
        $query=$this->db->insert('doctor', $data);
        return $query;
    }
    public function re_doctors($name,$time,$desc,$goal,$special,$did){
        $data = array(
            'doctor_name' => $name,
            'doctor_job' => $time,
            'doctor_message' => $desc,
            'doctor_place' => $goal,
            'doctor_special' => $special,
            'did' => $did
        );
        $this->db->where('did', $did);
        $query=$this->db->update('doctor', $data);
        return $query;
    }
    public function del_doctors($did){
        array(
            'did' => $did
        );
        $this->db->where('did', $did);
        $this->db->delete('doctor');
    }
    public  function add_article($name,$title,$desc,$type){
        $data = array(
            'article_id' => $name,
            'article_title' => $title,
            'article_content' => $desc,
            'article_class' => $type
        );
        $query=$this->db->insert('article', $data);
        return $query;
    }
    public function del_article($aid){
        $this->db->where('aid', $aid);
        $this->db->delete('article');
    }

    public function re_article($aid,$title,$content,$did,$class){
        $data = array(
            'aid' => $aid,
            'article_title' => $title,
            'article_content' => $content,
            'article_id' => $did,
            'article_class' => $class,
        );
        $query=$this->db->replace('article', $data);
        return $query;
    }



}
