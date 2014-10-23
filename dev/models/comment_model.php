<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model {
    
    
    function _addcomment($name,$message){
    	$this->load->database(); 
        $query  = "INSERT INTO comments (name,message,created_at,active) VALUES ('$name','$message',CURRENT_TIMESTAMP,0)";
    	$this->db->query($query); 
    }
    
     function _showcomments(){
    	$this->load->database();
    	$this->db->order_by("id", "desc"); 
    	$this->db->where('active', '1');
	$query=$this->db->get('comments');
	if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
}

?>
