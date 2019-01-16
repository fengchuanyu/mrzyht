<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog_model extends CI_Model{
		public function get_all(){
			$this->db->select('*');
			$this->db->from('t_blogs,t_blog_catalogs');
			$where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID";
			$this->db->where($where);
			$query=$this->db->get();

			return $query->result();
		}

		public function sel_note($num){
			$query=$this->db->get_where('t_blogs',array('BLOG_ID'=>$num));
			return $query->row();
		}


		public function get_catalog($uid){
			$query=$this->db->get_where('t_blog_catalogs',array('USER_ID'=>$uid));
			return $query->result();
		}

		public function get_all_by_name($uid){
			$this->db->select('*');
			$this->db->from('t_blogs,t_blog_catalogs');
			$where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_blogs.WRITER='$uid'";
			$this->db->where($where);
			$query=$this->db->get();
			

			// $sql="select * from t_blogs,t_blog_catalogs where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_blogs.WRITER='$uid'";
			// $query=$this->db->query($sql);
			return $query->result();
		}
		public function get_some_by_id($bid){
			$this->db->select('*');
			$this->db->from('t_blogs,t_blog_catalogs');
			$where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_blogs.BLOG_ID='$bid'";
			$this->db->where($where);
			$query=$this->db->get();
			

			// $sql="select * from t_blogs,t_blog_catalogs where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_blogs.WRITER='$uid'";
			// $query=$this->db->query($sql);
			return $query->result();
		}

		

	}


?>