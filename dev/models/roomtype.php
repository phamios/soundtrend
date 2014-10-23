<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roomtype extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /* ***** ROOMTYPE------------------------------*/
    function _showroomtype(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('roomtype');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _addroomtype($name){
    	$this->load->database();
    	$data = array('name'=>$name);
    	$this->db->insert('roomtype', $data); 
    }
    
    function _updateroomtype($id,$name){
    	$this->load->database();
        $data = array('name'=>$name);
        $this->db->where('id', $id);
        $this->db->update('roomtype', $data); 
    }
    
    function _showtypebyid($id){
        $this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get_where('roomtype',$id);
        if ($query->num_rows() > 0)
        {
          foreach($query->result() as $row)
          {
          	$get = $row->name.','.$get;
               
          }
           return $get;
        } 
        return null;
    }
    
    function _delroomtype($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('roomtype');
    } 
    
    function showtypenamebyid(){
        $this->load->database();
        $this->db->order_by("id", "desc");  
        $query=$this->db->get('room');
        if ($query->num_rows() > 0)
        {
          foreach($query->result() as $row)
          {
          	$get = $row->roomtypeid;
               
          }
           return $get;
        } 
        return null;
    }
    
    /* ***** ROOM------------------------------*/
    function _showroom(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('room');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _showroombylang($lang){
    	$this->load->database();
    	$this->db->order_by("id", "desc"); 
        $this->db->where('roomlang',$lang);
        $query=$this->db->get('room');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _showroombyid($id){
        $this->load->database();
    	$this->db->order_by("id", "desc"); 
        $this->db->where('id',$id);
        $query=$this->db->get('room');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _addroom($name,$des,$roomtype,$images,$cost,$currency,$lang){
        $this->load->database();
        $data = array(
            'name' => $name,
            'des' => $des,
            'images' => $images,
            'cost' => $cost,
            'roomtypeid' =>$roomtype,
            'currency' => $currency,
            'roomlang' =>$lang
        );
        $this->db->insert('room', $data); 
    }
    
    
    function _getlastid(){
        $this->load->database(); 
    	$this->db->select_max('id');
        $query = $this->db->get('room');
    	foreach($query->result() as $row)
          {
          	return $row->id;
          }
        return 0;
    }
    
    function showroombyid($id){
        $this->load->database();
        $this->db->where(array('id' =>$id));
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('room');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return null;
    }
    
    function _updateroom($id,$name,$des,$roomtype,$images,$cost,$currency,$lang){
        $this->load->database();
        if($images == null) {
            $data = array(
                'name' => $name,
                'des' => $des,
                'cost' => $cost,
                'roomtypeid' =>$roomtype,
                'currency' => $currency,
                'roomlang' =>$lang
            );
        }else{
            $data = array(
                'name' => $name,
                'des' => $des,
                'images' => $images,
                'cost' => $cost,
                'roomtypeid' =>$roomtype,
                'currency' => $currency,
                'roomlang' =>$lang
            );
        }
        $this->db->where('id', $id);
        $this->db->update('room', $data); 
    }
    
    function _delroom($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('room');
    }
    
    /* ***** ROOM & TYPE------------------------------*/
    function _addroomvstype($roomid,$roomtypeid){
        $this->load->database();
        $data = array(
            'roomid' => $roomid,
            'roomtypeid' => $roomtypeid
        );
        $this->db->insert('roomvstype', $data); 
    }
    
    
    
    
}