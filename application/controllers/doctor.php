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
    public function getoffice(){
        $query=$this->Doctor_model->get_office();
        if ($query) {
            foreach ($query as $row){
                $data[]=$row;
            }
            $result=array(
                'code'=>"1000",
                'message'=>'成功了',
                'data'=>$data,
            );
            echo json_encode($result);
        }
    }
    public function deloffice(){
        $oid=$this->input->post('oid');
        $this->Doctor_model->del_office($oid);
    }
    public function addoffice(){
        $name=$this->input->post('o_name');
        $query=$this->Doctor_model->add_office($name);
        if($query){
            echo "添加成功";
        }
    }
    public function adddoc()
    {
        $name=$this->input->post('name');
        $office=$this->input->post('office');
        $desc=$this->input->post('desc');
        $place=$this->input->post('place');
        $job=$this->input->post('job');
        $price=$this->input->post('price');
        $image=$this->input->post('img');
        $query=$this->Doctor_model->add_doctors($office,$name,$job,$desc,$place,$price,$image);
        if($query){
            echo "添加成功";
        }
    }
    public function redoc()
    {
        $office=$this->input->post('doctor_office');
        $name=$this->input->post('doctor_name');
        $time=$this->input->post('doctor_job');
        $desc=$this->input->post('doctor_message');
        $goal=$this->input->post('doctor_place');
        $price=$this->input->post('doctor_price');
        $did=$this->input->post('did');
        $query=$this->Doctor_model->re_doctors($office,$name,$time,$desc,$goal,$price,$did);
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
        $time=$this->input->post('time');
        $query=$this->Doctor_model->add_article($name,$title,$desc,$type,$time);
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
    public function selo(){
        $userName=$this->input->post('userName');
        $password=$this->input->post('password');
        $query=$this->Doctor_model->se_lo($userName,$password);
        if($query){
            echo 1;
        }
    }
    public function repass(){
        $userName=$this->input->post('userName');
        $password=$this->input->post('password');
        $newpass=$this->input->post('newpass');
        $querry=$this->Doctor_model->re_pass($userName,$password,$newpass);
        if($querry){
            echo 1;
        }
    }

}
