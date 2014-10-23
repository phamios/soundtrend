<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed'); 
class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library("soap");
		$this->load->model('category');
		$this->load->library('session');
		$this->load->model('content');
		$this->load->model('menu_model');
		$this->load->model('roomtype');
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->helper('recaptcha_helper');
		$this->load->helper(array('form', 'url'));
	}

	public function _langid(){
		if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+3600) {
			$this->session->sess_destroy();
			$_SESSION = array();
		}
		$_SESSION['EXPIRES'] = time() + 3600;

		$this->load->model('lang_model');
		$currentlang = $this->session->userdata('lang');
		if($currentlang ==''){
			$currentlang = $this->config->item('language');
		}
		$langid = $this->lang_model->_menuid($currentlang);
		return $langid;
	}
	 
	
	public function index(){
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('category');
		$this->load->model('merchant_model');
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid()); 
		$catemerchant = $this->merchant_model->showtopcate();
		$data['numbercate'] = $catemerchant;  
		$this->load->model('merchant_model');
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
 		$this->load->view('header', $data);
		$contents = $this->merchant_model->showmerchanthotcontent();
		foreach($contents as $row){ 
			$data['merchantnews'] = $this->merchant_model->showhomebycontentid($row->merchantcontentid);
			$data['merchantrelates'] = $this->merchant_model->showhomebynotlikecontentid($row->merchantcontentid,$row->cateid);
			$this->load->view('merchantcontenthome',$data);
		}
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$this->load->model('banner_model');
		$data['slidesbottom'] = $this->banner_model->showimagebottomlimit(); 
		$this->load->view('slidebottom', $data);
		$this->load->view('footer', $data);
		
	}

	public function merchant(){
		 $this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('category');
		$this->load->model('merchant_model');
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid()); 
		$catemerchant = $this->merchant_model->showtopcate();
		$data['numbercate'] = $catemerchant; 
		$this->load->model('merchant_model');
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		//$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$this->load->view('header', $data);
		foreach($catemerchant as $row){
			$data['catename'] = $row->name;
			$data['cateid'] = $row->id;
			$data['merchantnews'] = $this->merchant_model->showmerchantcontentallbycate($row->id);
			$this->load->view('merchantall',$data);
		}
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$this->load->view('footer', $data);
	}
	
	public function checkCaptCha($string1,$string2){
		$privatekey = $this->config->item('private_recaptcha_key');
		$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$string1,
		$string2);
		if (!$resp->is_valid) {
			return false;
		} else {
			return true;
		}
	}
	public function contact_form($log=""){
		$notification = "";
		$this->load->model('category');
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['topnewsmerchant'] = $this->merchant_model->showtopcontentmerchant(); 
		if (isset($_REQUEST['submit'])) {
			$string1 = $this->input->post('recaptcha_challenge_field',true);
			$string2= $this->input->post('recaptcha_response_field',true);
			if($this->checkCaptCha($string1, $string2) == true ){
				$name = $this->input->post('name_comment', true);
				$phone = $this->input->post('phone_comment', true);
				$email = $this->input->post('email_comment', true);
				$subject = $this->input->post('subject_comment', true);
				$comment = $this->input->post('text_comment', true);
				$this->load->model('home_model');
				$this->home_model->_addcontact($name,$phone,$email,$subject,$comment);
				redirect('home/contact_form/success');
			}else{
				redirect('home/contact_form/unsuccess');
			}
			
		}
		if($log == 'success'){
		$data['notification'] = 'Cám ơn bạn đã sử dụng dịch vụ của chúng tôi, chúng tôi sẽ liên hệ với bạn sớm nhất ';
		}elseif($log == 'unsuccess'){
		$data['notification'] = 'Xin bạn vui lòng kiểm tra lại !';
		}else{
			$data['notification'] = '';
		}
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		$publickey = $this->config->item('public_recaptcha_key');
		$data['captcha'] = recaptcha_get_html($publickey);
		$this->load->view('home', $data);
	}
	
	public function search($error=null){
		$notification = "";
		$this->load->model('category');
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['topnewsmerchant'] = $this->merchant_model->showtopcontentmerchant(); 
		$data['searchresults'] = array();
		$data['request'] = 0;
		if (isset($_REQUEST['searchcontent'])) {
			$data['request'] = 1;
			 $this->load->model('home_model');
			 $keyword = $this->input->post('keyword', true); 
			 $searchtype= $this->input->post('searchtype',true);
			 if(strlen($keyword) < 1 ){
			 	redirect('home/search/error');
			 }else{
				 $searchtypename = 0;
				 if($searchtype == 1){
				 	$searchtypename = "merchant";
				 }elseif($searchtype == 2) {
				 	$searchtypename = "content";
				 } 
				 $this->home_model->savesearch($keyword,$this->_locTiengviet($keyword),$searchtype,$searchtypename);
				 $config['base_url'] = site_url('home/search');
				 $config['total_rows'] = $this->home_model->totalsearch($this->_locTiengviet($keyword));
				 $config['per_page'] = 10;
				 $this->pagination->initialize($config);
				 $data['count'] = $config['total_rows'];
				 $data['searchresults'] = $this->home_model->searchkey($this->_locTiengviet($keyword),$config['per_page'],$this->uri->segment(3));
			 } 
		}
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		if($error ="error"){
			$data['error'] = "Keyword can not be null";
		}else{
			$data['error'] = "";
		}
		$this->load->view('home', $data);
	}
	
	
	
	public function register($log=""){
		$notification = "";
		$accountname = ""; 
		$this->load->model('category');
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['childmenus'] = $this->merchant_model->showallcate();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['topnewsmerchant'] = $this->merchant_model->showtopcontentmerchant(); 
		if (isset($_REQUEST['submit'])) {
			$string1 = $this->input->post('recaptcha_challenge_field',true);
			$string2= $this->input->post('recaptcha_response_field',true);
			if($this->checkCaptCha($string1, $string2) == true ){
				$name = $this->input->post('name', true);
				$des = $this->input->post('des', true);
				$location = $this->input->post('address', true);
				$registernumber = $this->input->post('regnumber', true);
				$web = $this->input->post('website', true);
				$tel = $this->input->post('tel', true);
				$hint = $this->input->post('sector', true);
				$namecontact = $this->input->post('namecontact', true);
				
					$emailcontact = $this->input->post('emailcontact', true);
					$telcontact = $this->input->post('telcontact', true); 
					$cateidmerchant = $this->input->post('catemerchant',true);
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$catenamemerchant =  $this->merchant_model->returnCatenamemerchant($cateidmerchant);
			  
					$this->load->model('home_model');
					$this->load->model('user_model');
					$username = str_replace(" ","",$this->_locTiengviet($namecontact)); 
					$accountname = $username.rand(1, 99); 
					$this->home_model->register_user($accountname); 
					$userid = $this->user_model->returnUserID($accountname) ;
					 
					$this->home_model->register_merchant($cateidmerchant,$catenamemerchant,$name,$des,$location,$web,$tel,$hint,$namecontact,$emailcontact,$telcontact,$registernumber,$userid,$image);
					//$this->session->set_userdata('accountname',$accountname);
					redirect('home/register/'.$accountname); 
			}else{
				redirect('home/register/unsuccess');
			}
			
		}	
		$accountname = $this->session->userdata('accountname');
		//echo $accountname; die();
		if($log == 'unsuccess'){
		$data['notification'] = 'Please check your infomation again !';
		}elseif($log <> null){
			$data['notification'] = 'Your account name: <h3>'.$log. '</h3> and your password: <h3>123456</h3> We have just sent a emailt to you, please open email and active your account !';
		}elseif($log == null){
			$data['notification'] ="";
		}elseif($log == "lost"){
			$data['notification'] ="All information ( * ) must be filled";
		}
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		$publickey = $this->config->item('public_recaptcha_key');
		$data['captcha'] = recaptcha_get_html($publickey);
		$this->load->view('home', $data);
	}
	
	public function intro($id){ 
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$this->load->model('category');
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		 $data['categories'] = $this->merchant_model->showallcate();
		$data['langs']= $this->lang_model->_showlang();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['intros'] = $this->intro_model->_showintrobyid($id);
		$this->load->view('home', $data);
	}

	public function cate($id = 0) {
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('menu_model');
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		 $data['categories'] = $this->merchant_model->showallcate();
		//$data['childmenus'] = $this->category->getchildmenu($id);
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['contents'] = $this->content->_showallcontentfront($id);
		$this->load->view('home', $data);
	}
	
	public function partner( ) {
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('menu_model');
		$this->load->model('home_model');
		$data['topcomments'] = $this->home_model->showallcomment();
		 $data['categories'] = $this->merchant_model->showallcate();
		//$data['childmenus'] = $this->category->getchildmenu($id);
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$this->load->view('home', $data);
	}

	public function mndc($cateid=null){
		$this->load->model('category'); 
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$this->load->model('home_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$this->merchant_model->updatecountcatemerchant($cateid);
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['topcomments'] = $this->home_model->showallcomment();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$data['thiscatename'] = $this->merchant_model->returnCatenamemerchant($cateid);
		$config['base_url'] = site_url('home/mndc/'.$cateid.'/');
		$config['total_rows'] = $this->merchant_model->totalmerchantcontentbycate($cateid);
		$config['per_page'] = 20;
		$config['first_link'] = 'Quay lại';
		$config['last_link'] = 'Cuối';
		$config['next_link'] = 'Tiếp';
		$config['prev_link'] = 'Trở lại';
		$this->pagination->initialize($config);
		$data['contents']=$this->merchant_model->showmerchantnewscatepage($cateid,$config['per_page'],$this->uri->segment(4));
		$data['page'] = $this->pagination->create_links();
			
		//$data['contents'] = $this->merchant_model->showmerchantnewscate($cateid);
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['intros'] = $this->intro_model->_showintro($this->_langid());
		$this->load->view('home', $data);
	}
	 
	 
	public function mrts($id=null){
		$this->load->model('category'); 
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$this->load->model('home_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['topcomments'] = $this->home_model->showallcomment();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew(); 
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['mrtsdetail'] = $this->merchant_model->merchantid($id);
		$data['intros'] = $this->intro_model->_showintro($this->_langid());
		$this->load->view('home', $data);
	}
	
	public function mrtsc($id=null){
		$this->load->model('category'); 
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$this->load->model('home_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['topcomments'] = $this->home_model->showallcomment();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew(); 
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['allcontents'] = $this->merchant_model->showallmerchantnewsbyuser($id);
		$data['intros'] = $this->intro_model->_showintro($this->_langid());
		$this->load->view('home', $data);
	}

	public function mnd($id=null,$error=null){
		$this->load->model('home_model');
		if (isset($_REQUEST['makecomment'])) {
			$idcontent = $this->input->post('idcontent',true);
			$name_comment = $this->input->post('name_comment',true);
			$link_yoursite = $this->input->post('link_yoursite',true);
			$text_comment = $this->input->post('text_comment',true);
			$contentname= $this->input->post('contentname',true);
			if($name_comment ==null && $text_comment == null){
				redirect('home/mnd/'.$idcontent.'/'.md5(md5('microtecfailx')));
			}else {  
				$this->home_model->addcomment($name_comment,$text_comment,$idcontent,$contentname);
				redirect('home/mnd/'.$idcontent);
			}
		}
		if($error == md5(md5('microtecfailx'))){
			$data['error'] = "Xin bạn vui lòng nhập tên và nội dung cần gửi !";
		}elseif($id==null){
			redirect('home/index');
		}else{
			$data['error'] ='';
		}
		$this->load->model('category');
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$this->merchant_model->updatecountcontentmerchant($id);
		$data['newmercontents'] = $this->merchant_model->shownewmerchantfrontend();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['comments'] = $this->home_model->show_comment($id);
		$data['topcomments'] = $this->home_model->showallcomment();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew();
		$data['contents'] = $this->merchant_model->showmerchantnewdetails($id);
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['intros'] = $this->intro_model->_showintro($this->_langid());
		$this->load->view('home', $data);
	}



	public function cusreview() {
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$this->load->model('comment_model');
		$this->load->model('category');
		 $data['categories'] = $this->merchant_model->showallcate();
		$data['danhgia'] = $this->comment_model->_showcomments();
		$this->load->view('home', $data);
	}

	public function _addcomment() {
		$this->load->model('lang_model');
		$this->load->model('category');
		$data['childmenus'] = $this->category->getchildmenu($id);
		$data['langs']= $this->lang_model->_showlang();
		if (isset($_REQUEST['submit'])) {
			$name = $this->input->post('usename', true);
			$message = $this->input->post('message', true);
			if (strlen($name) <> 0) {
				if (strlen($message) <> 0) {
					$this->load->model('comment_model');
					$this->comment_model->_addcomment(strip_tags($name), strip_tags($message));
					redirect('h/thankcomment/' . $name);
				}
			}
		}
	}

	public function thankcomment($username) {
		$this->load->model('lang_model');
		$this->load->model('category');
		 $data['categories'] = $this->merchant_model->showallcate();
		$data['langs']= $this->lang_model->_showlang();
		if (strlen($username) <= 0) {
			redirect('h/cusreview');
		} else {
			$data['user'] = strip_tags($username);
			$this->load->view('home', $data);
		}
	}

	public function add_comment($id=null){
		
		$this->load->model('category');
		$this->load->model('lang_model');
		$this->load->model('intro_model');
		$data['langs']= $this->lang_model->_showlang();
		$this->load->model('merchant_model');
		$data['contenthots'] = $this->merchant_model->showhotcontentmerchant();
		$data['catehots'] = $this->merchant_model->showhotcatemerchant();
		$data['categories'] = $this->merchant_model->showallcate();
		$data['merchantnew'] = $this->merchant_model->showmerchantnews();
		$data['merchantusernew'] = $this->merchant_model->showmerchantnew(); 
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());  
		$this->load->view('home', $data);
	}

	public function pro($id = 0) {
		$this->load->model('lang_model');
		$data['langs']= $this->lang_model->_showlang();
		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
		$data['random'] = $this->randbanner(1);
		$this->content->_updatecount($id);
		$this->load->model('category');
		$data['childmenus'] = $this->category->getchildmenu($id);
		$data['contents'] = $this->content->_showcontentbyid($id);
		$this->load->view('home2', $data);
	}
//
//	//booking - it's must have id of room
//	public function booking() {
//		$this->load->model('category');
//		$data['childmenus'] = $this->category->getchildmenu($id);
//		if (isset($_REQUEST['submit'])) {
//			$bookcheckin = $this->input->post('bookcheckin', true);
//			$bookcheckout = $this->input->post('bookcheckout', true);
//			$numberofly = $this->input->post('numberofly', true);
//			$bookadults = $this->input->post('bookadults', true);
//			$bookchildren = $this->input->post('bookchildren', true);
//			$bookrequest = $this->input->post('bookrequest', true);
//			$bookamountroom = $this->input->post('bookamountroom', true);
//			$fullname = $this->input->post('fullname', true);
//			$country = $this->input->post('country', true);
//			$address = $this->input->post('address', true);
//			$phone = $this->input->post('phone', true);
//			$email = $this->input->post('email', true);
//			$passport = $this->input->post('passport', true);
//			$bookingroom = $this->input->post('bookingroom', true);
//
//			if(strtotime($bookcheckin) < strtotime($bookcheckout) ){
//				$this->load->model('booking_model');
//				$this->booking_model->_addbooking($bookingroom,$numberofly,$bookcheckin,$bookcheckout,$bookadults,$bookchildren,$bookrequest,$bookamountroom,$fullname,$country,$address,$phone,$email,$passport);
//				redirect('home');
//			}else {
//				redirect('home/error/1');
//			}
//		}
//		$this->load->model('lang_model');
//		$data['rooms'] = $this->roomtype->_showroombylang($this->_langid());
//		$data['langs']= $this->lang_model->_showlang();
//		$data['danhmucmenu'] = $this->menu_model->_showmenubyorder($this->_langid());
//		$this->load->view('home2',$data);
//	}

	public function error($type=0){

		if($type==0){

		}
		if($type==1){
			$this->load->view('error');
		}
	}
	public function checkLang() {
		switch ($this->config->item('language')) {
			case "english":
				$this->session->unset_userdata('lang');
				$_SESSION['lang'] = 1;
				$this->session->set_userdata($sessionArray);
				break;
			case "france":
				$this->session->unset_userdata('lang');
				$_SESSION['lang'] = 2;
				$this->session->set_userdata($sessionArray);
				break;
			case "vietnam":
				$this->session->unset_userdata('lang');
				$_SESSION['lang'] = 3;
				$this->session->set_userdata($sessionArray);
				break;
		}
	}

	public function randbanner($type) {
		if ($type == 1) {
			$numbers = array(
                'vgm1-banner.jpg',
                'vgm2-banner.jpg',
                'vgm3-banner.jpg',
                'vgm5-banner.jpg',
                'vgm9-banner.jpg',
                'vgm10-banner.jpg',
                'vsmc-banner.jpg',
                'vnt-banner.jpg',
                'vgm6-banner.jpg');
		} else {
			$numbers = array(
                'vgt1-banner.jpg',
                'vgt3-banner.jpg',
                'vgt4-banner.jpg',
                'vgt8-banner.jpg',
                'vgt10-banner.jpg',
                'vgt11-banner.jpg',
                'vgt12-banner.jpg',
                'vpt1-banner.jpg',
                'vpt3-banner.jpg',
                'vpt4-banner.jpg',
                'vpt6-banner.jpg',
                'vpt7-banner.jpg',
                'vpt-banner.jpg',
                'vgt13-banner.jpg');
		}

		shuffle($numbers);
		foreach ($numbers as $number) {
			$data['random'] = $number;
			return $data['random'];
		}
	}

	function checkuseragent($text) {
		$string = $text;
		$container = $_SERVER['HTTP_USER_AGENT'];

		if (strstr($container, $string)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function default_lang(){
		$this->session->set_userdata('lang', 'vietnam');
		$this->config->set_item('language', 'vietnam');
	}
	
	function do_upload_image($mypath,$filename){
			// UPload Zip
			$config['upload_path'] = $mypath;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '20000';
			$this->load->library('upload', $config);
			if(isset($filename))
			{
				//echo $filename; die();
				if (!$this->upload->do_upload($filename))
				{
					$error = array('error' => $this->upload->display_errors());
					return NULL;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$imagename = $this->upload->file_name;
					return $imagename;
				}
			}else {
				echo $this->upload->display_errors();
			}
		}
		
	function lang($type){
		$this->load->model('lang_model');
		$languages= $this->lang_model->_showlang();
		foreach ($languages as $lang) {
			if($type==$lang->name){
				$this->session->set_userdata('lang', $lang->name);
				$this->config->set_item('language', $lang->name);
			}
		}
		redirect("home");

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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */