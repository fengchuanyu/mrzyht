<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor_model extends CI_Model{
    public function get_doctors(){
        $query = $this->db->from('offices')->join('doctor','offices.oid=doctor.doctor_office')->get();
        return $query->result();
    }
    public function get_office(){
        return $this->db->get('offices')->result();
    }
    public function add_office($name){
        $data = array(
            'o_name' => $name
        );
        $query=$this->db->insert('offices', $data);
        return $query;
    }
    public function add_doctors($office,$name,$job,$desc,$place,$price,$image){
        $data = array(
            'doctor_office' =>$office,
            'doctor_name' => $name,
            'doctor_job' => $job,
            'doctor_message' => $desc,
            'doctor_place' => $place,
            'doctor_price' => $price,
            'doctor_image' => $image
        );
        $query=$this->db->insert('doctor', $data);
        return $query;
    }
    public function re_doctors($office,$name,$time,$desc,$goal,$price,$did){
        $data = array(
            'doctor_office' =>$office,
            'doctor_name' => $name,
            'doctor_job' => $time,
            'doctor_message' => $desc,
            'doctor_place' => $goal,
            'doctor_price' => $price,
            'did' => $did
        );
        $this->db->where('did', $did);
        $query=$this->db->update('doctor', $data);
        return $query;
    }
    public function del_office($oid){
        $this->db->where('oid', $oid);
        $this->db->delete('offices');
    }
    public function del_doctors($did){
        array(
            'did' => $did
        );
        $this->db->where('did', $did);
        $this->db->delete('doctor');
    }
    public  function add_article($name,$title,$desc,$type,$time){
        $data = array(
            'article_id' => $name,
            'article_title' => $title,
            'article_content' => $desc,
            'article_class' => $type,
            'article_time' => $time
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
