<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
			header("Access-Control-Allow-Origin: *");

		}

		public function index(){
			// $query=$this->User_model->search_data();
			// foreach ($query as $row){
			//     $data[]=$row;
			// }
			// $result=array(
			// 	'code'=>"1000",
			// 	'message'=>'成功了',
			// 	'data'=>$data,
			// );
			// echo json_encode($result);
			$query=$this->User_model->search_data();
			foreach ($query as $row){
			    $data[]=$row;
			}
			// $result=array(
			// 	'code'=>"1000",
			// 	'message'=>'成功了',
			// 	'data'=>$data,
			// );
			echo json_encode($data);
		}

		public function addills(){
			$title=$this->input->post('input');
			$content=$this->input->post('textarea');

			$query=$this->User_model->checkname($title);
			if ($query) {
				echo "此病种名称已存在";
				die();
			}
			
			$query=$this->User_model->insert_data($title,$content);
			if($query){
				echo "添加成功";
				die();
			}
		}
		
		public function allills(){
			$query=$this->User_model->all_data();
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

		public function delete(){
			$title=$this->input->post('input');
			$content=$this->input->post('textarea');
			$query=$this->User_model->delete($title);
			if($query){
				echo "删除成功";

			}
			
		}	

		public function change(){
			$iid=$this->input->post('iid');
			$title=$this->input->post('input');
			$content=$this->input->post('textarea');
			$query=$this->User_model->change($iid,$title,$content);
			if($query){
				echo "更改成功";
			}
			
		}

		public function getusers(){
			$data=array();
			$query=$this->User_model->get_alluser();
			foreach ($query as $row){
			    $data[]=$row;
			}
			echo json_encode($data);
		}

		public function article(){
			$result = $this->User_model->get_article('article');
			echo json_encode($result);
		}
        public function allcate(){
            $result = $this->User_model->get_cate('categorize');
            echo json_encode($result);
        }

		public function change_article(){
			$iid=$this->input->post('iid');
			$title=$this->input->post('title');
			$content=$this->input->post('content');
			$query=$this->User_model->change_article($iid,$title,$content);
			if($query){
				echo "<script>alert('更改成功');</script>";
				echo "<script>window.location.href='http://localhost:8080/illclass/illclass_details_page';</script>";
			}
		}
        public function allreg(){
            $query=$this->User_model->all_reg();
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
        public function allreg2(){
            $query=$this->User_model->all_reg2();
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
        public function changereg(){
		    $query=$this->User_model->change_reg('registration');
		    echo json_encode($query);
//		    var_dump($query);
        }
        public function rereg(){
		    $rid=$this->input->post('rid');
		    $r_tag=$this->input->post('r_tag');
		    $querry=$this->User_model->re_reg($rid,$r_tag);
            if($querry){

            }
		    /*$date=$this->input->post();
		    $query=$this->User_model->re_reg($date);
		    if($query){

            }*/
//		    var_dump($date);
        }
        public function seuser(){
		    $did=$this->input->post('did');
		    $oid=$this->input->post('oid');
            $query=$this->User_model->se_user($did,$oid);
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
        public function addcase(){
            $title=$this->input->post('title');
            $oid=$this->input->post('oid');
            $did=$this->input->post('did');
            $uid=$this->input->post('uid');
            $desc=$this->input->post('desc');
            $com=$this->input->post('com');
            $fang=$this->input->post('fang');
            $date=$this->input->post('date');
            $zhuyi=$this->input->post('zhuyi');
            $query=$this->User_model->add_case($title,$oid,$did,$uid,$desc,$com,$fang,$date,$zhuyi);
            if($query){
                echo "添加成功";
            }
        }
        public function getcase(){
            $query=$this->User_model->get_case();
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
        public function delcase(){
		    $c_id=$this->input->post('c_id');
		    $query=$this->User_model->del_case($c_id);
		    if($query){
		        echo '删除成功';
            }
//		    $date=$this->input->post();
//		    var_dump($date);

        }
        public function changecase(){
            $c_id=$this->input->post('c_id');
            $c_name=$this->input->post('c_name');
            $c_describe=$this->input->post('c_describe');
            $c_diagnosis=$this->input->post('c_diagnosis');
            $c_attention=$this->input->post('c_attention');
            $c_solve=$this->input->post('c_solve');
            $query=$this->User_model->change_case($c_id,$c_name,$c_describe,$c_diagnosis,$c_attention,$c_solve);
            if($query){
                echo "更改成功";
            }
        }
        public function secase(){
            $did=$this->input->post('did');
            $oid=$this->input->post('oid');
            $query=$this->User_model->se_case($did,$oid);
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
        public function sedis(){
		    $d_pid=$this->input->post('d_pid');
            $query=$this->User_model->se_dis($d_pid);
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
        public function adddis(){
            $d_pid=$this->input->post('d_pid');
            $d_content=$this->input->post('add');
            $d_time=$this->input->post('time');
            $d_sign=$this->input->post('sign');
            $query=$this->User_model->add_dis($d_pid,$d_content,$d_time,$d_sign);
            if($query){
                echo "添加成功";
            }
        }

    }