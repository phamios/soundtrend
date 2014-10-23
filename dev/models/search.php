<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  
    function _showcontent($num,$row){
    	$this->load->database();
		$query=$this->db->get('content',$num,$row);
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return null;
    }
    
    /*
     * Total row Content
     */
	function _totalrows(){
    	$this->load->database(); 
		return $this->db->count_all('content');
    }
    
    function _addcontent($name,$cateid,$type,$link,$image,$active){
    	$this->load->database();
    	$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid,
    		'type'=>$type,
    		'link'=>$link,
    		'image'=>$image,
    		'active'=>$active
    		);
    	$this->db->insert('content', $data); 
    }
    
    function _updatecontent($name,$cateid,$type,$link,$image,$active){
    	$this->load->database();
    	if($image == null){
    		$data = array(
                'name'=>$name,
	    		'cateid'=>$cateid,
	    		'type'=>$type,
	    		'link'=>$link, 
	    		'active'=>$active
            );
    	}else {
    		$data = array(
                'name'=>$name,
	    		'cateid'=>$cateid,
	    		'type'=>$type,
	    		'link'=>$link,
	    		'image'=>$image,
	    		'active'=>$active
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