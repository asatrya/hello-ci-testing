<?php

class Member_m extends CI_Model {

	public function get_member($member_id = NULL)
	{
		if($member_id != NULL){
			$this->db->where('id', $member_id);
		}
		$query = $this->db->get('member');
		return $query->result();
	}

}