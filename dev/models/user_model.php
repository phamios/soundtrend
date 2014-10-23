<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function _showuser($num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc");
		//$this->db->where('active', '1');
		$query=$this->db->get('tbuser',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function returnUserID($username){
		$this->load->database(); 
		$this->db->where('username',$username);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->id; 
			}
		}else{
			return null;
		}
	}

	function userType($username){
		$this->load->database(); 
		$this->db->where('username',$username);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->type; 
			}
		}else{
			return null;
		}
	}
	
	function userTypebyid($id){
	$this->load->database(); 
		$this->db->where('id',$id);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->type; 
			}
		}else{
			return null;
		}
	}
	
	function userRoot($username){
		$this->load->database(); 
		$this->db->where('username',$username);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->root; 
			}
		}else{
			return null;
		}
	}
	
	function addrole($rolelist,$module,$userid){
		$this->load->database();
		$data = array(
            'rolelist' => $rolelist,
            'module' => $module,
            'userid' => $userid
		);
		$this->db->insert('userrole', $data);
	}

	function getrole($userid,$module){
		$this->load->database();
		$this->db->where(array('userid'=>$userid,'module'=>$module));
		$query = $this->db->get('userrole');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->rolelist;
			}
		}else{
			return null;
		}
	}

	function showalluser(){
		$this->load->database();
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0 ){
			return $query->result();
		}
		return $query->result();
	}

	function showuserbyid($id){
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0 ){
			return $query->result();
		}
		return $query->result();
	}
	
	
	function showmember($num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('memactive', '1');
		$query=$this->db->get('tbmember',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function checkAuthen($username,$password,$type){
		$this->load->database();
		$this->db->where(array('active'=>1,'username'=>$username,'type'=>$type,'password'=>md5(md5($password.'m1cr0t3c'))));
		$query = $this->db->get('tbuser');
		if($query->num_rows() >0){
			return true;
		}else {
			return false;
		}
	}

	function _showalluser(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbuser');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showuserbycateid($num=0,$row=0,$cateid=0){
		$this->load->database();
		$this->db->where(array('active'=>1,'cateid'=>$cateid));
		$query=$this->db->get('tbuser',$num,$row);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showalluserfront($id){
		$this->load->database();
		if($id==0){
			$this->db->where(array('active'=>1));
		}else {
			$this->db->where(array('active'=>1,'id'=>$id));
		}
		$this->db->limit(5);
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbuser');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showuserbyid($id){
		$this->load->database();
		$this->db->where('id', $id);
		$query=$this->db->get('tbuser');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}


 
	function _showusermax($num,$row){
		$this->load->database();
		$this->db->order_by("count", "desc");
		$this->db->where('active', '1');
		$query=$this->db->get('tbuser',$num,$row);
		if ($query->num_rows() > 0)
		{
			//foreach($query->result() as $row)
			//{
			//	return $row->Totalrow;
			//}
			return $query->result();
		}
		return $query->result();
	}


	function _updatecount($id){
		$this->load->database();
		$querystring= "select count from tbuser where id=".$id;
		$result= $this->db->query($querystring);
		if ($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$concount =  $row->count;
			}

		}
		$data2 = array ('count'=>$concount+1);
		$this->db->where('id', $id);
		$this->db->update('user', $data2);
	}

	function _showuserbycate($id,$num,$row){
		$this->load->database();
		$this->db->where(array('cateid' =>$id,'active'=>1));
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbuser',$num,$row);
		if ($query->num_rows() > 0)
		{
			//foreach($query->result() as $row)
			//{
			//	return $row->Totalrow;
			//}
			return $query->result();
		}
		return $query->result();
	}

	/*
	 * Total row user
	 */
	function _totalrows(){
		$this->load->database();
		return $this->db->count_all('tbuser');
	}
	function _totalmember(){
		$this->load->database();
		return $this->db->count_all('tbmember');
	}



	function _adduser($username,$password,$type,$active){ 
		if($this->returnUserID($username) <> null){
			return false;
		}else{
		$this->load->database();
		$data = array(
    		'username'=>$username,
    		'password'=>md5(md5($password.'m1cr0t3c')),
    		'type'=>$type,
    		'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
		);
		$this->db->insert('tbuser', $data);
		return true;
		}
	}
	
	function _updateuser($id,$username,$password,$type,$active){ 
		if($this->returnUserID($username) <> null){
			return false;
		}else{
		$this->load->database();
		if(strlen($password) == 0){
			$data = array(
	    		'username'=>$username,
	    		'type'=>$type,
	    		'active'=>$active,
	    		'createdate'=>date("d-m-Y"), 
			);
		}else{
			$data = array(
	    		'username'=>$username,
	    		'password'=>md5(md5($password.'m1cr0t3c')),
	    		'type'=>$type,
	    		'active'=>$active,
	    		'createdate'=>date("d-m-Y"), 
			);
		}
		
		$this->db->where('id', $id);
		$this->db->update('tbuser', $data);
		return true;
		}
	}
	
	
	function _addusermerchant($username,$password,$type,$active,$root){ 
		if($this->returnUserID($username) <> null){
			return false;
		}else{
			$this->load->database();
			$data = array(
	    		'username'=>$username,
	    		'password'=>md5(md5($password.'m1cr0t3c')),
	    		'type'=>$type,
	    		'active'=>$active,
	    		'createdate'=>date("d-m-Y"), 
				'root' =>$root
			);
			$this->db->insert('tbuser', $data);
			return true;
		}
	}
	 
	 

	function _deluser($id){
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('tbuser');
	}


}
