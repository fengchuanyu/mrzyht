<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Case_model extends CI_Model{
	public function get_cases_all () {
		$query = $this -> db -> get('illcase');
		return $query -> result();
	}
	
	public function get_cases_id($cid) {
		
		$this -> db -> from('illcase');
		$this -> db -> where('caseid', $cid);
		$query = $this -> db -> get();
		
		return $query -> row();
	}
	
	 public function resetcase($cid, $casename, $casetime, $casedia, $casedes, $caseadv){
	 	echo "$cid";
        $data = array(
        	'caseid' => $cid,
            'case_name' => $casename,
            'case_time' => $casetime,
            'case_describe' => $casedes,
            'case_advice' => $caseadv,
            'case_diagnosis' => $casedia,
        );
		// $this -> db -> where('caseid', $cid);
        // $query = $this->db->update('illcase', $data);
        $query = $this -> db -> replace('illcase', $data);
        return $query;
    }
}
?>