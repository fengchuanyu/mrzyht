<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cased extends CI_Controller {
    public function __construct(){
        parent::__construct();
		$this->load->helper('captcha');
        $this->load->model('Case_model');
        header("Access-Control-Allow-Origin: *");
    }
        public function getcase() { 
            $cased = $this->Case_model->get_cases_all();
            $data['cased'] = $cased;
            echo  json_encode($cased);
        }
		
		public function get_case_id(){
			$cid = $_POST['case_id'];
			$query = $this -> Case_model -> get_cases_id($cid);
			echo json_encode($query);
		}
		
		public function updatacase() {
			$cid = $this -> input -> post('caid');
	        $casename = $this -> input -> post('case_name');
	        $casetime = $this -> input -> post('case_time');
	        $casedia = $this -> input -> post('case_diagnosis');
	        $casedes = $this -> input -> post('case_describe');
			$caseadv = $this -> input -> post('case_advice');
			$this->load->model('Case_model');
	        $query = $this -> Case_model -> resetcase($cid, $casename, $casetime, $casedia, $casedes, $caseadv);
	        if ($query) {
	            echo "$title";
	        }
		}
    }


?>
