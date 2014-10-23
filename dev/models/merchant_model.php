<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Merchant_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function _showmerchant($num,$offset){
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
	
	function showhotcontentmerchant(){
		$this->load->database();
		$this->db->order_by("count", "desc");
		$this->db->where('active', '1');
		$this->db->limit(5);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showhotcatemerchant(){
		$this->load->database();
		$this->db->order_by("count", "desc");
		$this->db->where('active', '1');
		$this->db->limit(5);
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function showallcatemerchantall(){
		$this->load->database();
		$this->db->order_by("count", "desc");
		$this->db->where('active', '1'); 
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	//---------------------------------------------------------------------
	//UPdate Count Category Merchant
	function updatecountcatemerchant($id){
		$this->load->database(); 
		$lastcount = $this->returncountcatemerchant($id);
		$this->db->where('id', $id);
		$data=array(
			'count' =>$lastcount + 1,
		);
		$this->db->update('tbmerchantcate', $data); 
	}
	function returncountcatemerchant($id){
		$this->load->database();
    	$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
        {
	    	foreach($query->result() as $row){
	    		return $row->count;
	    	}
        }  
        else {
        	return 0;
        }
	}
	//---------------------------------------------------------------------
	//Update Count Content Merchant
	function updatecountcontentmerchant($id){
		$this->load->database(); 
		$lastcount = $this->returncountcontentmerchant($id);
		$this->db->where('id', $id);
		$data=array(
			'count' =>$lastcount + 1,
		);
		$this->db->update('tbmerchantcontent', $data); 
	}
	function returncountcontentmerchant($id){
		$this->load->database();
    	$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
        {
	    	foreach($query->result() as $row){
	    		return $row->count;
	    	}
        }  
        else {
        	return 0;
        }
	}
	//---------------------------------------------------------------------
	function showtopcontentmerchant(){
		$this->load->database(); 
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showallmerchantcontent($num,$offset){
		$this->load->database(); 
		$this->db->order_by("id", "desc"); 
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showallmerchantcontentall(){
		$this->load->database(); 
		$this->db->order_by("id", "desc"); 
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function shownewmerchantfrontend(){
		$this->load->database(); 
		$this->db->order_by("id", "desc"); 
		$this->db->limit(30);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showmerchantnewscate($cateid){
		$this->load->database(); 
		$this->db->order_by("id", "desc"); 
		$this->db->where('cateid', $cateid);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showmerchantnewscatepage($cateid,$num,$offset){
		$this->load->database(); 
		$this->db->order_by("id", "desc");  
		$this->db->where(array('cateid'=>$cateid,'active'=>'1'));
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	 
	function updatemerchantinfo($id,$cateidmerchant,$catenamemerchant,$name,$des,$location,$web,$tel,$hint,$namecontact,$emailcontact,$telcontact,$registernumber,$images){
		$this->load->database(); 
		if($images <> null){
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
			'logo'=>$images
		);
		}else{
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
			'active'=>0, );
		}
		$this->db->where('id',$id);
		$this->db->update('tbmerchant', $data);
	}
	
	function showmerchantdetails($id){
		$this->load->database();   
		$this->db->where(array('userid'=>$id));
		$query=$this->db->get('tbmerchant'); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showallmerchantmod(){ 
		$this->load->database(); 
		$this->db->select('name, userid, catenamemerchant'); 
		$query=$this->db->get('tbmerchant');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showmerchantnewdetails($id){
		$this->load->database(); 
		$this->db->where('id', $id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function showmerchantcontent($num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc");
		//$this->db->where('active', '1');
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function showmerchantcontentall(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('active', '1');
		$this->db->limit(3);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showmerchantcontentallbycate($id){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where(array('active'=>1,'cateid'=>$id));
		$this->db->limit(1);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function showmerchant_user($num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('type', '2');
		$query=$this->db->get('tbuser',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function _showmerchantcontentroot($userid,$num,$offset){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('userid', $userid);
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function showcontentmerchantbyid($id){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('userid', $id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	public function merchantid($id){
		$this->load->database();
		$this->db->where('userid',$id);
		$query=$this->db->get('tbmerchant');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	public function showallmerchantnewsbyuser($id){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where(array('active'=>1,'userid'=>$id));
		$this->db->limit(5);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	
	public function showmerchantnews(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('active', 1);
		$this->db->limit(5);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	public function showmerchantnew(){
		$this->load->database();
		$this->db->order_by("id", "desc"); 
		$this->db->limit(7);
		$query=$this->db->get('tbmerchant');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	 
	function totalmerchant(){
		$this->load->database();
		return $this->db->count_all('tbmerchant');
	}
	function totalmerchantcontentbycate($cateid){
//		$this->load->database();
//		$this->db->where(array('cateid'=>$cateid,'active'=>1));
//		return $this->db->count_all('tbmerchantcontent');
		$this->load->database();
		$query="select count(id) as total from tbmerchantcontent where cateid=".$cateid." and active=1";
		$results = $this->db->query($query);
		$count = 0;
		if ($results->num_rows() > 0)
		{
			foreach($results->result() as $row){
				$count= $row->total;
			}
		}else {
			$count = 0;
		}
 		return $count;
	}

	function returnCatenamemerchant($cateid){
		$this->load->database();
		$this->db->where('id',$cateid);
		$query = $this->db->get('tbmerchantcate');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->name;
			}
		}else {
			return null;
		}
		
	}

	function statusmerchant($id,$active){
		$this->load->database();
		$data = array(
			'active'=>$active
		);
		$this->db->where('id',$id);
		$this->db->update('tbuser', $data);
	}

	function updatestatusmerchantroot($id,$active){
		$this->load->database();
		$data = array(
			'active'=>$active
		);
		$this->db->where('root',$id);
		$this->db->update('tbuser', $data);
	}

	
	function totalusermerchant(){
		$this->load->database();
		$this->db->where('type',2);
		return $this->db->count_all('tbuser');
	}
	
	function totalmerchantcontent($id=0){
		$this->load->database();
		if($id != 0 or $id <> null){
			$this->db->where('userid',$id);
		} 
		return $this->db->count_all('tbmerchantcontent');
	}

	function showtotalmerchantcontent(){
		$this->load->database();
		return $this->db->count_all('tbmerchantcontent');
	}
	
	function show_merchant_content($userid,$num,$offset){
		$this->load->database();
		if($userid != 0){
			$this->db->where('userid',$userid);
		}
		$query=$this->db->get('tbmerchantcontent',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function returnmerchantuserbyid($id){
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('tbmerchant');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->name;
			}
		}else {
			return null;
		}
	}
	function showmerchantcontentbyadmin($cateid){
		$this->load->database();  
		$this->db->where('cateid',$cateid); 
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function showmerchantcontentbyuserid($id,$userid=0){
		$this->load->database();
		if($userid != 0 ){
			$this->db->where(array('userid'=>$userid,'id'=>$id));
		}else {
			$this->db->where(array('id'=>$id));
		}
		
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	//Cate Merchant ----------------------------------------------------------------------
	function showallcatemerchant($num,$offsets){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbmerchantcate',$num,$offsets);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	
	function _totalrows(){
		$this->load->database();
		return $this->db->count_all('tbmerchant');
	}
	/*
	 * merchant cate
	 */
	function showallcate(){
		$this->load->database();
		$this->db->order_by("id", "asc");
		$this->db->where('active',1);
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function showtopcate(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('active',1);
		$this->db->limit(10);
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function showmerchantcate(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('active',1);
		$query=$this->db->get('tbmerchantcate');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function returncatenamebyid($id){
		$catename = "";
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('tbmerchantcate');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$catename =  $row->name;
			}
		}else{
			return null;
		}
		return $catename;
	}

	function returncatemerchantID($cateid){
		$this->load->database();
		$this->db->where('catemerchant',$cateid);
		$query = $this->db->get('catemerchant');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->id;
			}
		}else{
			return null;
		}
	}

	function checkcate($name){
		$this->load->database();
		$this->db->where('name',$name);
		$query = $this->db->get('tbmerchantcate');
		if($query->num_rows() > 0){
			return  false;
		}else{
			return true;
		}
	}

	function add_cate_merchant($name,$active){

		$this->load->database();
		$data = array(
            'name' => $name,
            'active' => $active
		);
		$this->db->insert('tbmerchantcate', $data);
	}
	//end cate merchant---------------------------------------------------------

	function showallmember($id){
		$this->load->database();
		$this->db->where('root',$id);
		$query = $this->db->get('tbuser');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return $query->result();
		}
	}

	function _updatecount($id){
		$this->load->database();
		$querystring= "select count from tbmerchantcontent where id=".$id;
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
		$this->db->update('tbmerchantcontent', $data2);
	}
	
	/*
	 * merchant hot   --------------------------------------------------------------------
	 */
	function showhomebycontentid($id){
		$this->load->database(); 
		$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			  return $query->result();
		}
		return $query->result();
	}
	function showcatenamebymerid($id){
		$this->load->database(); 
		$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->catename;
			}
		}else { 
			return 0;
		}
	}
	function showhomebynotlikecontentid($id,$cateid){ 
		$this->load->database(); 
		//$cateid = $this->cateidofmerchanthot($id);
		$this->db->where('cateid',$cateid);
		$this->db->where_not_in('id', $id);
		$this->db->order_by('count','desc');
		$this->db->limit(1); 
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			  return $query->result();
		}
		return $query->result();
	}
	
	
	function cateidofmerchanthot($id){
		$this->load->database(); 
		$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->cateid;
			}
		}else { 
			return 0;
		}
		
	}
	function showmerchanthotcontent(){
		$this->load->database();
		$this->db->order_by('order');
		$query=$this->db->get('tbmerchanthot');
		if ($query->num_rows() > 0)
		{
			  return $query->result();
		}
		return $query->result();
	}
	function returnnamecontentmerchant($id){
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('tbmerchantcontent');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->name;
			}
		}else {
			return null;
		}
		
	}
	function showcatenamemerchant($id){
		$this->load->database();
		$this->db->where('id',$id);
		$query=$this->db->get('tbmerchantcontent');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row){
				return $row->cateid;
			}
		}
		return null;
		
	}
	function addmerchantcontenthot($contentid,$order,$contentname,$contentcate,$cateid){
		$this->load->database();
		$data = array(
    		'merchantcontentid'=>$contentid,
    		'order'=>$order,
    		'contentname'=>$contentname,
    		'catemerchantname'=>$contentcate, 
			'cateid'=>$cateid
		);
		$this->db->insert('tbmerchanthot', $data);
	}
	
	function updatemerchantcontenthot($id,$contentid,$order,$contentname,$contentcate){
		$this->load->database();
		$data = array(
    		'merchantcontentid'=>$contentid,
    		'order'=>$order,
    		'contentname'=>$contentname,
    		'catemerchantname'=>$contentcate, 
			'cateid'=>$cateid
		);
		$this->db->where('id', $id);
		$this->db->update('tbmerchanthot', $data);
	}
	
	function updateastatusmercontent($id,$active){
		$this->load->database();
		$data = array(
    		'active'=>$active 
		);
		$this->db->where('id', $id);
		$this->db->update('tbmerchantcontent', $data);
	}
	
	function showmerchanthot(){
		$this->load->database(); 
		$query = $this->db->get('tbmerchanthot');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return $query->result();
		}
	}
	function countmerchanthot(){
		$this->load->database(); 
		return $this->db->count_all('tbmerchanthot'); 
		
	}
	function delmerchanthot($id){
		$this->load->database();
		$this->db->where(array('id'=>$id));
		$this->db->delete('tbmerchanthot');
	}
	function delmerchantbyid($id){
		$this->load->database();
		$this->db->where(array('id'=>$id)); 
		$this->db->delete('tbmerchant');
		
	}
	function returnuseridbymerchatid($id){
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('tbmerchant');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				return $row->userid;
			}
		}else {
			return null;
		}
	}
	function delallcontentmerchantbyid($id){
		$this->load->database(); 
		$this->db->where(array('userid'=>$this->returnuseridbymerchatid($id)));
		$this->db->delete('tbmerchant');
	}
	/*
	 * merchant content --------------------------------------------------------------------
	 */
	
	function _addcontentmerchant($name,$cateid,$image,$active,$catename,$des,$lang,$userid){
			
		$this->load->database();
		$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid,
    		'image'=>$image,
    		'catename'=>$catename,
			'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
			'des'=>$des,
			'lang'=>$lang,
			'userid'=>$userid,
			'search'=>$this->_locTiengviet(strip_tags($des))
		);
		$this->db->insert('tbmerchantcontent', $data);
	}
	
	

	function _updatecontentmerchant($id,$name,$cateid,$image,$active,$catename,$des,$lang,$userid){ 
		$this->load->database();
		if($image == null){
			$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid, 
    		'catename'=>$catename,
			'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
			'des'=>$des,
			'lang'=>$lang,
			'userid'=>$userid,
			'search'=>$this->_locTiengviet(strip_tags($des))
			);
		}else{
			$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid,
    		'image'=>$image,
    		'catename'=>$catename,
			'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
			'des'=>$des,
			'lang'=>$lang,
			'userid'=>$userid,
			'search'=>$this->_locTiengviet(strip_tags($des))
			);
		}
			
		$this->db->where('id', $id);
		$this->db->update('tbmerchantcontent', $data);
	}
	
	function _updatecontentmerchantroot($id,$name,$cateid,$image,$active,$catename,$des,$lang,$userid){ 
		$this->load->database();
		if($image == null){
			$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid, 
    		'catename'=>$catename,
			'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
			'des'=>$des,
			'lang'=>$lang,
			'search'=>$this->_locTiengviet(strip_tags($des))
			);
		}else{
			$data = array(
    		'name'=>$name,
    		'cateid'=>$cateid,
    		'image'=>$image,
    		'catename'=>$catename,
			'active'=>$active,
    		'createdate'=>date("Y-m-d H:i:s"), 
			'des'=>$des,
			'lang'=>$lang,
			'search'=>$this->_locTiengviet(strip_tags($des))
			);
		}
			
		$this->db->where('id', $id);
		$this->db->update('tbmerchantcontent', $data);
	}

	function _delcontentmerchant($id,$userid,$type=0){
		$this->load->database();
		if($type == 0){
			$this->db->where(array('id'=>$id,'userid'=>$userid));
		}else {
			$this->db->where(array('id'=>$id));	
		}
		$this->db->delete('tbmerchantcontent');
	}
	function delmembermerchant($id,$userid){
		$this->load->database();
		$this->db->where(array('id'=>$id,'root'=>$userid));
		$this->db->delete('tbuser');
	}
	
	function _locTiengviet($content){
			$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
			 "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
			 ,"ế","ệ","ể","ễ",
			 "ì","í","ị","ỉ","ĩ",
			 "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
			 ,"ờ","ớ","ợ","ở","ỡ",
			 "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
			 "ỳ","ý","ỵ","ỷ","ỹ",
			 "đ",
			 "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
			 ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
			 "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
			 "Ì","Í","Ị","Ỉ","Ĩ",
			 "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
			 ,"Ờ","Ớ","Ợ","Ở","Ỡ",
			 "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
			 "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
			 "Đ");
			 $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
			 ,"a","a","a","a","a","a",
			 "e","e","e","e","e","e","e","e","e","e","e",
			 "i","i","i","i","i",
			 "o","o","o","o","o","o","o","o","o","o","o","o"
			 ,"o","o","o","o","o",
			 "u","u","u","u","u","u","u","u","u","u","u",
			 "y","y","y","y","y",
			 "d",
			 "A","A","A","A","A","A","A","A","A","A","A","A"
			 ,"A","A","A","A","A",
			 "E","E","E","E","E","E","E","E","E","E","E",
			 "I","I","I","I","I",
			 "O","O","O","O","O","O","O","O","O","O","O","O"
			 ,"O","O","O","O","O",
			 "U","U","U","U","U","U","U","U","U","U","U",
			 "Y","Y","Y","Y","Y",
			 "D");
			 return str_replace($marTViet,$marKoDau,$content);
			return $content;
		}

}
