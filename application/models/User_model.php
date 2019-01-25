<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function search_data(){
			$this->db->select('*');
			$this->db->from('users,registration,doctor');
			$where="users.uid=registration.r_uid and registration.r_did=doctor.did";
			$this->db->where($where);
			$query=$this->db->get();

			return $query->result();
		}
		// public function insert_name(){
		// 	$query = $this->db->get_where('ill-class', array('iid' => $id));
		// 	return $query->result();
		// }

		public function checkname($title){
			$query = $this->db->get_where('illclass', array('ill_title' => $title));
			return $query->row();
		}

		public function insert_data($title,$content){
			$data = array(
			    'ill_title' => $title,
			    'ill_content' => $content,
			);
			$query=$this->db->insert('illclass', $data);
			return $query;
		}

		public function all_data(){
			$this->db->select('*');
			$this->db->from('illclass');
			$query=$this->db->get();
			return $query->result();
		}

		public function delete($title){
			return $this->db->delete('illclass', array('ill_title' => $title));
		}

		public function change($iid,$title,$content){
			$data = array(
				'iid' => $iid,
			    'ill_title' => $title,
			    'ill_content'  => $content
			);
			return $this->db->replace('illclass', $data);
		}
		public function get_alluser(){
			$query = $this->db->get_where('users');
			return $query->result();
		}

		public function get_article(){
			return $this->db->from('article')->join('doctor','article.article_id=doctor.did')->join('categorize','categorize.cate_id=article.article_class')->get()->result();
		}
		public function get_cate(){
		    return $this->db->from('categorize')->get()->result();
        }

		public function changearticle($aid,$title,$content){
			$data = array(
				'aid' => $aid,
			    'article_title' => $title,
			    'article_content'  => $content
			);
			return $this->db->replace('article', $data);
		}
        public function all_reg(){
            $query = $this->db->from('registration')->join('users','users.uid=registration.r_uid')->join('doctor','doctor.did=registration.r_did')->get_where('','r_tag=1');
            return $query->result();
        }
        public function all_reg2(){
            $query = $this->db->from('registration')->join('users','users.uid=registration.r_uid')->join('doctor','doctor.did=registration.r_did')->get_where('','r_tag=2');
            return $query->result();
        }
        public function change_reg(){
		    return $query = $this->db->from('registration')->get()->result();
        }
        public function re_reg($rid,$r_tag){
            $data = array(
                'rid' =>$rid,
                'r_tag' => $r_tag,
            );
            $this->db->where('rid', $rid);
            $query=$this->db->update('registration', $data);
            return $query;
//            return $this->db->update_batch('registration',$date);
        }
        public function se_user($did,$oid){
		    $this->db->where('did=',$did);
            $this->db->where('oid=', $oid);
            $this->db->where('r_tag=2');
            $date = $this->db->from('doctor')->join('offices','doctor.doctor_office=offices.oid')->join('registration','doctor.did=registration.r_did')->join('users','registration.r_uid=users.uid')->get();
		    return $date->result();
        }
        public function add_case($title,$oid,$did,$uid,$desc,$com,$fang,$date,$zhuyi){
            $data = array(
                'c_name' =>$title,
                'c_oid' => $oid,
                'c_did' => $did,
                'c_describe' => $desc,
                'u_id' => $uid,
                'c_diagnosis' => $com,
                'c_solve' => $fang,
                'c_time' =>$date,
                'c_attention' => $zhuyi
            );
            $query=$this->db->insert('cases', $data);
            return $query;
        }
        public function get_case(){
            return $this->db->from('cases')->join('offices','cases.c_oid=offices.oid')->join('doctor','doctor.did=cases.c_did')->join('registration','cases.c_time=registration.r_date')->get()->result();
        }
        public function change_case($c_id,$c_name,$c_describe,$c_diagnosis,$c_attention,$c_solve){
            $data = array(
                'c_id' => $c_id,
                'c_name' => $c_name,
                'c_describe'  => $c_describe,
                'c_diagnosis' => $c_diagnosis,
                'c_attention' => $c_attention,
                'c_solve'  => $c_solve
            );
            $this->db->where('c_id', $c_id);
            return $this->db->update('cases', $data);
        }
	}
?>