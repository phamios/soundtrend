<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
 	function addcomment($name,$message,$contentid,$contentname){
 		$this->load->database();
		$data = array(
    		'name'=>$name,
    		'message'=>$message,
    		'contentid'=>$contentid,
    		'contentname'=>$contentname,
			'active'=>1,
    		'created_at'=>date("Y-m-d H:i:s"),
			'timecreate'=>date('H:i:s')
		);
		$this->db->insert('comments', $data);
 	}
 	
 	function show_comment($id){
 		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('contentid',$id);
		$this->db->limit(10);
		$this->db->where(array('active'=>1));
		$query=$this->db->get('comments');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
 	}
 	
 	function showallcomment(){
 		$this->load->database();
		$this->db->order_by("id", "desc"); 
		$this->db->limit(5);
		$this->db->where(array('active'=>1));
		$query=$this->db->get('comments');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
 	}
	function _addcontact($name,$phone,$email,$subject,$content){ 
		$this->load->database();
		$data = array(
    		'name'=>$name,
    		'phone'=>$phone,
    		'email'=>$email,
    		'subject'=>$subject,
			'content'=>$content,
    		'createdate'=>date("Y-m-d H:i:s")
		);
		$this->db->insert('tblcontactus', $data);
	}
	
	function register_user($name){
		$this->load->database();
		$data = array(
			'username'=>$name,
			'password'=>md5(md5('123456'.'m1cr0t3c')),
			'type'=>2,
			'active'=>0,
			'createdate'=>date("d-m-Y H:i:s"),
		);
		$this->db->insert('tbuser', $data);
	}
	
	function register_merchant($cateidmerchant,$catenamemerchant,$name,$des,$location,$web,$tel,$hint,$namecontact,$emailcontact,$telcontact,$registernumber,$userid,$images){
		$this->load->database();
		$data = array(
			'catemerchantid' =>$cateidmerchant,
			'catenamemerchant' =>$catenamemerchant,
    		'name'=>$name,
    		'des'=>$des,
			'web'=>$web,
    		'location'=>$location,
    		'tel'=>$tel,
			'fax'=>$tel,
			'hint'=>$hint,
    		'createdate'=>date("d-m-Y"),
			'contact1' =>$namecontact.'--'.$emailcontact.'--'.$telcontact,
			'registernumber'=>$registernumber,
			'active'=>0,
			'userid'=>$userid,
			'logo'=>$images
		);
		$this->db->insert('tbmerchant', $data);
	}
	
	//SEARCHING ---------------------------------
	public function savesearch($content,$contentremove,$type,$typename){
		$this->load->database();
		$data = array(
			'content'=>$content,
			'content_r'=>$contentremove,
			'type'=>$type,
			'typename'=>$typename,
			'createdate'=>date('Y-M-d H:i:s'),
		);
		$this->db->insert('tblsearch',$data);
	}
	
	public function searchkey($keyword,$num,$offset){
		$this->load->database();  
		$querystring = "select * from tbmerchantcontent where search like '%".$keyword."%'"; 
		$query = $this->db->query($querystring);
		//$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function add_hotconfig(){
		
	}
	function totalsearch($keyword){
		$this->load->database();
		$this->db->where(array('active'=>1));
		$this->db->like('search', $keyword,'both'); 
		return $this->db->count_all('tbmerchantcontent'); 
//		$this->load->database();
//		$querystring = "select count(*) as countx from tbmerchantcontent where search like '%".$keyword."%'"; 
//		$query = $this->db->query($querystring);
//		foreach ($query->result as $row)
//		{
//			return $row->countx;
//		}
//		return $query->result();
	}
}