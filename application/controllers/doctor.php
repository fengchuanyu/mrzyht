<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Doctor_model');
        header("Access-Control-Allow-Origin: *");
    }

    public  function index(){
        $this->load->view('test');
    }

    public function getdoc()
    {
        $doctor = $this->Doctor_model->get_doctors('doctor');
        echo  json_encode($doctor);
    }
    public function adddoc()
    {
        $name=$this->input->post('name');
        $time=$this->input->post('workyear');
        $desc=$this->input->post('desc');
        $goal=$this->input->post('goal');
        $special=$this->input->post('goodat');
        $image=$this->input->post('img');
        $query=$this->Doctor_model->add_doctors($name,$time,$desc,$goal,$special,$image);
        if($query){
            echo "添加成功";
        }
    }
    public function redoc()
    {
        $name=$this->input->post('doctor_name');
        $time=$this->input->post('doctor_job');
        $desc=$this->input->post('doctor_message');
        $goal=$this->input->post('doctor_place');
        $special=$this->input->post('doctor_special');
        $did=$this->input->post('did');
        $query=$this->Doctor_model->re_doctors($name,$time,$desc,$goal,$special,$did);
        if ($query){
            echo "修改成功";
        }
    }
    public function deldoc()
    {
        $did=$this->input->post('did');
        $this->Doctor_model->del_doctors($did);
    }

    public function addarticle()
    {
        $name=$this->input->post('name');
        $title=$this->input->post('title');
        $desc=$this->input->post('desc');
        $type=$this->input->post('type');
        $query=$this->Doctor_model->add_article($name,$title,$desc,$type);
        if($query){
            echo "添加成功";
        }
    }

    public function delarticle()
    {
        $aid=$this->input->post('aid');
        $this->Doctor_model->del_article($aid);
    }

    public function rearticle()
    {
        $aid=$this->input->post('aid');
        $title=$this->input->post('article_title');
        $content=$this->input->post('article_content');
        $did=$this->input->post('article_id');
        $class=$this->input->post('article_class');
        $query=$this->Doctor_model->re_article($aid,$title,$content,$did,$class);
        if ($query){
            echo "$title";
        }
    }

}
