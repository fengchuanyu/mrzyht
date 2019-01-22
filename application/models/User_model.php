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
		        'rid' => $rid,
                'r_tag' => $r_tag
            );
            $this->db->where('rid', $rid);
            $query=$this->db->update('registration', $data);
            return $query;
        }
	}
?>