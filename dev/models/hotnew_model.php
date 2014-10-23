<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotenew_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function showhotnew($num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc"); 
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

 
}