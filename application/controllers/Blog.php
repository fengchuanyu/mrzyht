<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Blog_model');
		}

		public function index(){
			$uid=$this->session->userdata('uid');
			$rs=$this->Blog_model->get_all_by_name($uid);
			$data['blogs']=$rs;
			$this->load->view('index_logined.php',$data);
		}
		public function unindex(){
			$rs=$this->Blog_model->get_all();
			$data['blogs']=$rs;


			$this->load->view('index.php',$data);
		}

		public function newupdate(){

			$num=$this->uri->segment(3);
			$rs=$this->Blog_model->sel_note($num);

			$uid=$this->session->userdata('uid');
			$catalogrs=$this->Blog_model->get_catalog($uid);

			$data['blog']=$rs;
			$data['catalogs']=$catalogrs;
			$this->load->view('newBLog.php',$data);

		}

		public function details(){
			$bid=$this->uri->segment(3);
			$rs=$this->Blog_model->get_some_by_id($bid);
			$data['blogs']=$rs;

			$this->load->view('viewPost_comment.php',$data);
		}

		public function edit(){
			$this->load->helper('date');
			$uid=$this->session->userdata('uid');
			$title=$this->input->post('title');
			$content=$this->input->post('content');
			$type=$this->input->post('type');
			$format = 'DATE_ATOM';
			$time = time();
			$time=standard_date($format, $time);
			if($type == 1){
				$type='原创';
			}else{
				$type='转帖';
			}
			echo "$type";
			// $this->Blog_model->


		}


	}


?>