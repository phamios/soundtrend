<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function _showcontent($num,$row){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('active', '1');
		$query=$this->db->get('content',$num,$row);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}



	function _showallcontent(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('content');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showcontentbycateid($num=0,$row=0,$cateid=0){
		$this->load->database();
		$this->db->where(array('active'=>1,'cateid'=>$cateid));
		$query=$this->db->get('content',$num,$row);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showallcontentfront($id){
		$this->load->database();
		if($id==0){
			$this->db->where(array('active'=>1));
		}else {
			$this->db->where(array('active'=>1,'id'=>$id));
		}
		$this->db->limit(5);
		$this->db->order_by("id", "desc");
		$query=$this->db->get('content');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showcontentbyid($id){
		$this->load->database();
		$this->db->where('id', $id);
		$query=$this->db->get('content');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}


	/*
	 * Return Link
	 */
	function _returnLink($id){
		$this->load->database();
		$this->db->where('id', $id);
		$query=$this->db->get('content');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->link;
			}

		}
		return null;
	}

	function _showcontentmax($num,$row){
		$this->load->database();
		$this->db->order_by("count", "desc");
		$this->db->where('active', '1');
		$query=$this->db->get('content',$num,$row);
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
		$querystring= "select count from content where id=".$id;
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
		$this->db->update('content', $data2);
	}

	function _showcontentbycate($id,$num,$row){
		$this->load->database();
		$this->db->where(array('cateid' =>$id,'active'=>1));
		$this->db->order_by("id", "desc");
		$query=$this->db->get('content',$num,$row);
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
	 * Total row Content
	 */
	function _totalrows(){
		$this->load->database();
		return $this->db->count_all('content');
	}

	function _addcontent($userid,$name,$cateid,$catename,$des,$link,$image,$active,$langid){
		$this->load->database();
		$data = array(
			'userid'=>$userid,
    		'name'=>$name,
    		'cateid'=>$cateid,
    		'des'=>$des,
    		'catename'=>$catename,
    		'link'=>$link,
    		'image'=>$image,
    		'active'=>$active,
            'lang' => $langid,
		);
		$this->db->insert('content', $data);
	}

	function _updatecontent($id,$userid,$name,$cateid,$catename,$des,$link,$image,$active,$langid){
		$this->load->database();
		if($image == null){
			$data = array(
				'userid'=>$userid,
                'name'=>$name,
	    		'cateid'=>$cateid,
    			'catename'=>$catename,
	    		'des'=>$des,
	    		'link'=>$link, 
	    		'active'=>$active,
                'lang' => $langid,
			);
		}else {
			$data = array(
				'userid'=>$userid,
                'name'=>$name,
	    		'cateid'=>$cateid,
    			'catename'=>$catename,
	    		'des'=>$des,
	    		'link'=>$link,
	    		'image'=>$image,
	    		'active'=>$active,
                'lang' => $langid,
			);
		}
		 
		$this->db->where('id', $id);
		$this->db->update('content', $data);
	}

	function _delcontent($id){
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('content');
	}


}