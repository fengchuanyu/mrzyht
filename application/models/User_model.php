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
			$query = $this->db->get_where('ill-class', array('ill_title' => $title));
			return $query->row();
		}

		public function insert_data($title,$content){
			$data = array(
			    'ill_title' => $title,
			    'ill_content' => $content,
			);
			$query=$this->db->insert('ill-class', $data);
			return $query;
		}

		public function all_data(){
			$this->db->select('*');
			$this->db->from('ill-class');
			$query=$this->db->get();
			return $query->result();
		}

		public function delete($title){
			return $this->db->delete('ill-class', array('ill_title' => $title));
		}

		public function change($iid,$title,$content){
			$data = array(
				'iid' => $iid,
			    'ill_title' => $title,
			    'ill_content'  => $content
			);
			return $this->db->replace('ill-class', $data);
		}
		public function get_alluser(){
			$query = $this->db->get_where('users');
			return $query->result();
		}

		public function get_article(){
			return $this->db->get('article')->result();
		}

		public function changearticle($aid,$title,$content){
			$data = array(
				'aid' => $aid,
			    'article_title' => $title,
			    'article_content'  => $content
			);
			return $this->db->replace('article', $data);
		}


	}
?>