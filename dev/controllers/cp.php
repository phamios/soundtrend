<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Cp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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
		//$this->load->library('validation');
		$this->load->helper('recaptcha_helper');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$data['nameuser'] = $this->session->userdata('authen');
			if($this->session->userdata('utype') == 2 or $this->session->userdata('utype') == 3){
				redirect('cp/merchant');
			}
			$this->load->view('cp/index',$data);
		}

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

	public function checkAuthen(){
		$data['errormess'] = "";
		if (isset($_REQUEST['submit'])) {
			//check captcha------------------------------
			$string1 = $this->input->post('recaptcha_challenge_field',true);
			$string2= $this->input->post('recaptcha_response_field',true);
			if($this->checkCaptCha($string1, $string2) == true ){
				$username = $this->input->post('tendangnhap',true);
				$password = $this->input->post('matkhau',true);
				$type = $this->input->post('quyenhan',true);
				$this->load->model('user_model');
				if($this->user_model->checkAuthen($username,$password,$type) == true) {
					$this->setSession($username);
					redirect("cp/index");
				}else {
					$data['errormess'] = "Xin vui lòng kiểm tra lại !";
				}
			} else {
				$data['errormess'] = "Xin vui lòng kiểm tra lại mã xác thực !";
			}
		}
		//tao captcha
		$publickey = $this->config->item('public_recaptcha_key');
		$data['captcha'] = recaptcha_get_html($publickey);
		$this->load->view('cp/login',$data);
	}

	public function checkout(){
		$this->session->unset_userdata('authen');
		$this->session->sess_destroy();
		redirect("cp/index");
	}

	public function setSession($username){
		$this->load->model('user_model');
		$usertype = $this->user_model->userType($username);
		$useroot =  $this->user_model->userRoot($username);
		$newdata = array(
                   'authen'  => $username,
                   'logtime'     => date("Y-m-d H:i:s"),
                   'logged_in' => TRUE,
					'utype' => $usertype,
					'uroot' => $useroot
		);
		$this->session->set_userdata($newdata);
	}
	/*
	 * Category  ************************************************************************
	 */
	public function cate(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('category');
			$config['base_url'] = site_url('cp/cate');
			$config['total_rows'] = $this->category->_totalrows(1);
			$config['per_page'] = 10;
			$this->pagination->initialize($config);
			$data['caties']=$this->category->_showcateadmin($config['per_page'],$this->uri->segment(3));
			$data['page'] = $this->pagination->create_links();
			$this->load->view('cp/index',$data);

		}
	}

	public function prterimagehome($error=null){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('banner_model');
			if (isset($_REQUEST['submit'])) {
				//$images = $this->input->post('fileimage',true);
				$mypath= "./uploads";

				$image=  $this->do_upload_image($mypath,'fileimage');
				if($image == null){
					redirect('cp/prterimagehome/error');
				}else{
					$this->banner_model->addimagesbottom($image);
					redirect('cp/prterimagehome');
				}
			}
			if($error=='error'){
				$data['error'] = 'Chưa chọn file ảnh !';
			}else{
				$data['error'] = '';
			}
			$config['base_url'] = site_url('cp/prterimagehome');
			$config['total_rows'] = $this->banner_model->totalimagebottom();
			$config['per_page'] = 10;
			$this->pagination->initialize($config);
			$data['images']=$this->banner_model->showimagebottom($config['per_page'],$this->uri->segment(3));
			$data['page'] = $this->pagination->create_links();
			$this->load->view('cp/index',$data);

		}
	}

	function uaib($id=null){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('banner_model');
			$this->banner_model->unactiveimagesbottom($id);
			redirect('cp/prterimagehome');
		}
	}

	function delib($id=null){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('banner_model');
			$this->banner_model->_delimagebottom($id);
			redirect('cp/prterimagehome');
		}
	}

	public function editcate($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('category');
			$data['caties']=$this->category->_showcatebyid($id);
			$data['id']= $id;
			$this->load->view('cp/index',$data);
		}
	}

	public function add_cate(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('contype');
			$this->load->model('category');
			$data['typies']=$this->category->_showallcate();
			$this->load->model('lang_model');
			$data['languies']= $this->lang_model->_showlang();
			$this->load->view('cp/index',$data);
		}
	}

	public function cateinsert(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$name = $this->input->post('name',true);
				$active = $this->input->post('active',true);
				$contype= $this->input->post('contype',true);
				$langid = $this->input->post('langid',true);
				if($active == 'on'){
					$active = 1;
				}else {$active = 0;}
				$mypath= "./uploads";
				$image=  $this->do_upload_image($mypath,'fileimage');
				//base_url().'uploads/'
				$this->load->model('category');
				$this->category->_addcate($name,$image,$active,$contype,$langid);
				redirect('cp/cate');
			}
		}
	}
	public function cateupdate($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$name = $this->input->post('name',true);
				$active = $this->input->post('active',true);
				if($active == 'on'){
					$active = 1;
				}else {$active = 0;}
				$mypath= "./uploads";
				$image=  $this->do_upload_image($mypath,'fileimage');
	 		$this->load->model('category');
	 		$this->category->_updatecate($id,$name,$image,$active);
	 		redirect('cp/cate');
			}
		}
	}

	function delcate($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('category');
			$this->category->_delcate($id);
			redirect('cp/cate');
		}
	}

	/*
	 * Type  ************************************************************************
	 */
	public function contype($num=0,$id=0){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('contype');
			$this->load->model('category');
			$config['base_url'] = site_url('cp/contype');
			$config['total_rows'] = $this->category->_totalrows(2);
			$config['per_page'] = 20;
			$this->pagination->initialize($config);

			if($id <> 0){
				$data['tyies']=$this->contype->_showtypebyid($id);
				$data['id']= $id;
				$data['page'] = null;
			}else{
				$data['tyies']= $this->contype->_showtype($config['per_page'],$num);
				$data['page'] = $this->pagination->create_links();
			}
			$this->load->view('cp/index',$data);
		}
	}

	function deltype($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('contype');
			$this->contype->_deltype($id);
			redirect('cp/contype');
		}
	}

	public function typeinsert(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$name = $this->input->post('name',true);
				$active = $this->input->post('active',true);
				if($active == 'on'){
					$active = 1;
				}else {$active = 0;}
	 		$this->load->model('contype');
	 		$this->contype->_addtype($name,$active);
	 		redirect('cp/contype');
			}
		}
	}
	public function typeupdate(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$name = $this->input->post('name',true);
				$active = $this->input->post('active',true);
				if($active == 'on'){
					$active = 1;
				}else {$active = 0;}
	 		$this->load->model('contype');
	 		$this->contype->_addtype($name,$active);
	 		redirect('cp/contype');
			}
		}
	}

	/*
	 * Language  ************************************************************************
	 */
	public function lang(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('lang_model');
			$data['languies']= $this->lang_model->_showlang();
			$this->load->view('cp/index',$data);
		}
	}

	public function add_lang(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$this->load->model('lang_model');
				$name = $this->input->post('langname',true);
				$this->lang_model->_addlang($name);
				redirect('cp/lang');
			}
		}
	}

	public function dellang($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('lang_model');
			$this->lang_model->_dellang($id);
			redirect('cp/lang');
		}
	}

	/*
	 * Image Manage  ************************************************************************
	 */
	public function listimage(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$this->load->model('content');
			$this->load->model('image_model');
			$this->load->model('user_model');
			$this->load->model('merchant_model');
			$usertype = $this->user_model->userType($this->session->userdata('authen'));
			$data['usertype'] = $usertype;
			if($usertype==1){
				$data['imagies']= $this->image_model->_showimagepost();
				$data['contents']=$this->content->_showallcontent();
			}else{
				$data['imagies']= $this->image_model->_showimagepostmerchant();
				//$data['contents']=$this->content->_showallcontent();
				$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				if($this->session->userdata('uroot') <> 0){
					$data['contents'] = $this->merchant_model->showcontentmerchantbyid($this->session->userdata('uroot'));
				}else{
					$data['contents'] = $this->merchant_model->showcontentmerchantbyid($userid);
				}
			}
			$this->load->view('cp/index',$data);
		}
	}

	public function add_images(){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			if (isset($_REQUEST['submit'])) {
				$this->load->model('image_model');
				$postid = $this->input->post('postid',true);
				$type = $this->input->post('typeimage',true);
				$mypath= "./uploads";
				$image=  $this->do_upload_image($mypath,'fileimage');
				$this->image_model->_addimages($image);
				$this->image_model->_addimagepost($postid,$type,$image);
				redirect('cp/listimage');
			}
		}
	}

	public function delimages($id){
		if($this->session->userdata('authen') == null ){
			redirect('cp/checkAuthen');
		} else {
			$iid = $id;
			$this->load->model('image_model');
			$image = $this->image_model->_delimage($iid);
			$this->image_model->delallimage($image);
			$this->image_model->_delimages($id);
			redirect('cp/listimage');
		}}

		/*
		 * Menu Manage  ************************************************************************
		 */

		public function menu($active=0){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('menu_model');
				$data['menus']=$this->menu_model->_showmenu($active);
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$this->load->view('cp/index',$data);
			}
		}

		public function add_menu(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('menu_model');
				$this->load->model('category');
				$this->load->model('lang_model');
				if(isset($_REQUEST['submit'])){
					$name = $this->input->post('menuname',true);
					$lang = $this->input->post('langid',true);
					$link = $this->input->post('menulink',true);
					$url = $this->input->post('menuurl',true);
					$order = $this->input->post('menuorder',true);
					$active = $this->input->post('active',true);
					$menuroot = $this->input->post('menuroot',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$this->menu_model->_addmenu($lang,$name,$link,$url,$active,$order);
					redirect('cp/menu');
				}
				$data['languies']= $this->lang_model->_showlang();
				$data['caties']= $this->category->_showallcate();
				$this->load->model('menu_model');
				$data['menus'] = $this->menu_model->_showmenu(1);
				$this->load->view('cp/index',$data);
			}
		}

		public function edit_menu($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('menu_model');
				$this->load->model('category');
				if(isset($_REQUEST['submit'])){
					$lang = $this->input->post('langid',true);
					$name = $this->input->post('menuname',true);
					$link = $this->input->post('menulink',true);
					$url = $this->input->post('menuurl',true);
					$order = $this->input->post('menuorder',true);
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}

					$this->menu_model->_updatemenu($id,$lang,$name,$link,$url,$active,$order);
					redirect('cp/menu');
				}
				$data['menus']=$this->menu_model->_showmenubyid($id);
				$data['caties']= $this->category->_showallcate();
				$this->load->view('cp/index',$data);
			}
		}

		public function delmenu($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('menu_model');
				$this->menu_model->_delmenu($id);
				redirect('cp/menu');
			}
		}

		/*
		 * Banner Manage  ************************************************************************
		 */
		public function banner(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('banner_model');
				$data['banners']= $this->banner_model->_showbanner();
				$this->load->view('cp/index',$data);
			}
		}

		public function add_banner(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$this->load->model('banner_model');
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$position = $this->input->post('position',true);
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$bannerlink = $this->input->post('bannerlink',true);

					$this->banner_model->_addbanner($image,$position,$active,$bannerlink);
					redirect('cp/banner');
				}
				$this->load->view('cp/index');
			}
		}


		public function update_banner(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$this->load->model('banner_model');
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$position = $this->input->post('position',true);
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$bannerlink = $this->input->post('bannerlink',true);
					$this->banner_model->_updatebanner($id,$image,$position,$active,$bannerlink);
					redirect('cp/banner');
				}
			}
		}

		public function delbanner($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('banner_model');
				$this->banner_model->_delbanner($id);
				redirect('cp/banner');
			}
		}

		/*
		 * Content  ************************************************************************
		 */

		public function content($num=0,$id=0){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('content');
				$this->load->model('category');
				$config['base_url'] = site_url('cp/content');
				$config['total_rows'] = $this->category->_totalrows(3);
				$config['per_page'] = 10;
				$this->pagination->initialize($config);
				$data['caties'] = $this->category->_showallcate();
				$data['pages'] = $this->pagination->create_links();
				$data['contents']=$this->content->_showcontent($config['per_page'],$this->uri->segment(3));
				$this->load->view('cp/index',$data);
			}
		}

		public function add_content(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('category');
				$data['caties'] = $this->category->_showallcate();
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$this->load->view('cp/index',$data);
			}
		}

		public function contentinsert(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$name = $this->_locTiengviet($this->input->post('name',true));
					$active = $this->input->post('active',true);
					$des = $this->_locTiengviet($this->input->post('des',true));
					$cateid = $this->input->post('cate',true);
					$link = $this->input->post('link',true);
					$langid= $this->input->post('langid',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					//base_url().'uploads/'
					$this->load->model('content');
					$this->load->model('category');
					$catename=$this->category->_showcatenamebyid($cateid);
					$this->load->model('user_model');
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
					$this->content->_addcontent($userid,$name,$cateid,$catename,$des,$link,$image,$active,intval($langid));
					redirect('cp/content');
				}
			}
		}

		public function contentupdate($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$name = $this->_locTiengviet($this->input->post('name',true));
					$active = $this->input->post('active',true);
					$des =  $this->_locTiengviet($this->input->post('des',true));
					$cateid = $this->input->post('cate',true);
					$link = $this->input->post('link',true);
					$langid= $this->input->post('langid',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$this->load->model('category');
					$this->load->model('content');
					$catename=$this->category->_showcatenamebyid($cateid);
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
					$this->content->_updatecontent($id,$userid,$name,$cateid,$catename,$des,$link,$image,$active,intval($langid));
					redirect('cp/content');
				}
				$this->load->model('content');
				$this->load->model('category');
				$data['caties'] = $this->category->_showallcate();
				$data['contenties']=$this->content->_showcontentbyid($id);
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$data['id']= $id;
				$this->load->view('cp/index',$data);
			}
		}


		function delcontent($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('content');
				$this->content->_delcontent($id);
				redirect('cp/content');
			}
		}
		/******CONFIG INTRO-----------------------------*/
		public function intro($id=0){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('intro_model');
				$data['intros'] = $this->intro_model->_showallintro();
				$this->load->view('cp/index',$data);
			}
		}

		public function addintro(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$this->load->model('intro_model');
					$name = $this->_locTiengviet($this->input->post('name',true));
					$active = $this->input->post('active',true);
					$des =  $this->_locTiengviet($this->input->post('des',true));
					$langid= $this->input->post('langid',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$this->intro_model->_addintro($name,$des,$image,$active,$langid);
					redirect('cp/intro');
				}

				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$this->load->view('cp/index',$data);
			}
		}

		public function updateintro($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('intro_model');
				if (isset($_REQUEST['submit'])) {
					$name = $this->_locTiengviet($this->input->post('name',true));
					$active = $this->input->post('active',true);
					$des =  $this->_locTiengviet($this->input->post('des',true));
					$langid= $this->input->post('langid',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$this->intro_model->_updateintro($id,$name,$des,$image,$active,$langid);
					redirect('cp/intro');
				}
				$data['id'] = $id;
				$data['uintros']=$this->intro_model->_showintrobyid($id);
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$this->load->view('cp/index',$data);
			}

		}

		public function delintro($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('intro_model');
				$this->intro_model->_delintro($id);
				redirect('cp/intro');
			}
		}

		/*
		 * User  ************************************************************************
		 */
		public function user(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('user_model');
				$this->load->library('pagination');
				$config['base_url'] = site_url('cp/user');
				$config['total_rows'] = $this->user_model->_totalrows();
				$config['per_page'] = 20;
				$this->pagination->initialize($config);
				$data['pages'] = $this->pagination->create_links();
				$data['users'] = 	$this->user_model->_showuser($config['per_page'],$this->uri->segment(3));
				$this->load->view('cp/index',$data);
			}
		}

		public function adduser(){
			$data['error'] = "";
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('user_model');
				if (isset($_REQUEST['submit'])) {
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$username = $this->input->post('username',true);
					$password= $this->input->post('password',true);
					$type = $this->input->post('type',true);
					$resultinsert = $this->user_model->_adduser($username,$password,$type,$active);
					if($resultinsert == true ){
						redirect('cp/user');
					}
					$data['error'] = "<font color=red>Tên user đã tồn tại !</font>";
				}

				$this->load->view('cp/index',$data);
			}
		}

		public function edituser($id){
			$data['error'] = "";
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('user_model');
				if (isset($_REQUEST['submit'])) {
					$this->load->model('user_model');
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$username = $this->input->post('username',true);
					$password= $this->input->post('password',true);
					$type = $this->input->post('type',true);
					$resultinsert = $this->user_model->_updateuser($id,$username,$password,$type,$active);
					if($resultinsert == true ){
						redirect('cp/user');
					}
					$data['error'] = "<font color=red>Tên user đã tồn tại !</font>";
				}
				$this->load->model('user_model');
				$data['userdetails'] = $this->user_model->showuserbyid($id);
				$this->load->view('cp/index',$data);
			}
		}

		function deleteuser($id){

		}

		public function role(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->view('cp/index');
			}
		}

		public function roleinfo(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('user_model');
				$data['users'] = $this->user_model->showalluser();
				if (isset($_REQUEST['submit'])) {
					//xử lý quyền truy cập
					$roletype = "";
					$module = "";
					$roletypes = $this->input->post('roletype',true);
					$userid = $this->input->post('username',true);
					$count = count($roletypes);
					for ($i = 0; $i < $count; $i++) {
						$roletype = $roletypes[$i].','.$roletype;
					}
					//xử lý module
					$modules = $this->input->post('module',true);
					$this->user_model->addrole($roletype,$modules,$userid);
					redirect('cp/user');
				}
				$this->load->view('cp/index',$data);
			}
		}
		/*
		 * Authen Role for each user  ************************************************************************
		 */
		function checkrole($module,$typerole){
			$this->load->model('user_model');
			$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
			$roles = $this->user_model->getrole($userid,$module);
			$role = explode(",", $roles);
			foreach($role as $r){
				if($typerole == $r){
					return true;
				}else{
					return false;
				}
			}
		}
		/*
		 * MERCHANT ************************************************************************
		 */
		public function merchant(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$useridroot = $this->session->userdata('uroot');
				$this->load->model('user_model');
				$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				$this->load->model('merchant_model');
				$config['base_url'] = site_url('cp/merchant');
				$config['per_page'] = 20;
				$usertype = $this->user_model->userType($this->session->userdata('authen'));
				$data['usertype'] = $usertype;
				if($usertype == 1){
					$config['total_rows'] = $this->merchant_model->totalusermerchant();
					$data['merchantcontents'] = $this->merchant_model->showmerchant_user($config['per_page'],$this->uri->segment(3));
				}else{
					if($this->session->userdata('uroot') <> 0){
						$config['total_rows'] = $this->merchant_model->totalmerchant();
						$data['merchantcontents'] = $this->merchant_model->_showmerchantcontentroot($useridroot,$config['per_page'],$this->uri->segment(3));
					}else{
						$config['total_rows'] = $this->merchant_model->totalmerchant();
						$data['merchantcontents'] = $this->merchant_model->show_merchant_content($userid,$config['per_page'],$this->uri->segment(3));
					}

				}
				$this->pagination->initialize($config);
				$data['pages'] = $this->pagination->create_links();
				$this->load->view('cp/index',$data);
			}
		}

		function merchantuserdetails($id=null){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$usertype = $this->session->userdata('utype');
				if($usertype == 1){
					$this->load->model('merchant_model');
					if (isset($_REQUEST['submit'])) {
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
						$this->merchant_model->updatemerchantinfo($id,$cateidmerchant,$catenamemerchant,$name,$des,$location,$web,$tel,$hint,$namecontact,$emailcontact,$telcontact,$registernumber,$image);

						redirect('cp/merchant/');
					}
					$data['childmenus'] = $this->merchant_model->showallcate();
					$data['merchantinfos'] = $this->merchant_model->showmerchantdetails($id);
					$this->load->view('cp/index',$data);
				}else{
					redirect('cp/index');
				}
			}
		}
		function add_merchant(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$usertype = $this->session->userdata('utype');
				if($usertype == 1){
					$this->load->model('merchant_model');
					if (isset($_REQUEST['submit'])) {
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
						if(strlen($namecontact) <= 1 or strlen($name) <=1 or strlen($image) <= 1){
							redirect('home/register/lost');
						}else{
							$this->load->model('home_model');
							$this->load->model('user_model');
							$username = str_replace(" ","",$this->_locTiengviet($namecontact));
							$accountname = $username.rand(1, 99);
							$this->home_model->register_user($accountname);
							$userid = $this->user_model->returnUserID($accountname) ; 
							$this->home_model->register_merchant($cateidmerchant,$catenamemerchant,$name,$des,$location,$web,$tel,$hint,$namecontact,$emailcontact,$telcontact,$registernumber,$userid,$image);
							redirect('cp/merchant/');
						}
					}
					$data['childmenus'] = $this->merchant_model->showallcate(); 
					$this->load->view('cp/index',$data);
				}else{
					redirect('cp/index');
				}
			}
		}
		function ajaxcate($id){
			$this->load->model('merchant_model');
			$contentmerch = $this->merchant_model->showmerchantnewscate($id);
			echo  "<select name='merchantidcontent'>";
			foreach($contentmerch as $row){
				echo  '<option value='.$row->id.'>'.$row->name.'</option>';
			}
			echo  '</select>';

		}
			
		public function merchanthot($error = null){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				if (isset($_REQUEST['setselect'])) {
					$id = $this->input->post('merchantidcontent',true);
					$order =$this->input->post('order',true);
					$cateid = $this->merchant_model->showcatenamemerchant($id);
					$contentname = $this->merchant_model->returnnamecontentmerchant($id);
					$catename = $this->merchant_model->returnCatenamemerchant($cateid);
					if($this->merchant_model->countmerchanthot() >= 5) {
						redirect('cp/merchanthot/error');
					}else {
					 $this->merchant_model->addmerchantcontenthot($id,$order,$contentname,$catename,$cateid);
					 redirect('cp/merchanthot');
					}
				}
				if($error == "error"){
					$data['error'] = '<font color="red"><b>Thiết lập có giới hạn 5 bài viết</b></font>';
				}else {
					$data['error'] = '';
				}
				$data['sesmerchantid']  = $this->session->userdata('merchantidslog');
				$this->load->model('user_model');
				$config['base_url'] = site_url('cp/merchanthot');
				$config['total_rows'] = $this->merchant_model->totalmerchantcontent();
				$config['per_page'] = 5;
				$this->pagination->initialize($config);
				$data['contentid']  = $this->merchant_model->showallmerchantcontentall();
				//$data['merchantcontents'] = $this->merchant_model->showallmerchantcontent($config['per_page'],$this->uri->segment(3));
				$data['showcates']= $this->merchant_model->showallcatemerchantall();
				$data['showhots']= $this->merchant_model->showmerchanthot();
				$data['pages'] = $this->pagination->create_links();
				$this->load->view('cp/index',$data);
			}
		}
		
		function delmerchant($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->merchant_model->delmerchantbyid($id);
				$this->merchant_model->delallcontentmerchantbyid($id);
				redirect('cp/merchant');
			}
		}
		function delmerchanthot($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->merchant_model->delmerchanthot($id);
				redirect('cp/merchanthot');
			}
		}

		public function activemerchant($id){
			$this->load->model('merchant_model');
			$this->merchant_model->statusmerchant($id,1);
			$this->merchant_model->updatestatusmerchantroot($id,1);
			redirect('cp/merchant');
		}

		public function disablemerchant($id){
			$this->load->model('merchant_model');
			$this->merchant_model->statusmerchant($id,0);
			$this->merchant_model->updatestatusmerchantroot($id,0);
			redirect('cp/merchant');
		}

		public function merchantmember(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				$data['members'] = $this->merchant_model->showallmember($userid);
				$this->load->view('cp/index',$data);
			}
		}

		public function add_merchantmember(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				if (isset($_REQUEST['submit'])) {
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$this->load->model('user_model');
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
					$result = $this->user_model->_addusermerchant($username,$password,3,1,$userid);
					redirect('cp/merchantmember');
				}
				redirect('cp/merchantmember');$this->load->view('cp/index',$data);
			}
		}

		public function delmembermerchant($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				$this->merchant_model->delmembermerchant($id,$userid);
				redirect('cp/merchantmember');
			}
		}

		public function delmerchantcontent($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				if($this->session->userdata('uroot') <> 0 ) {
					$userid = $this->session->userdata('uroot');
				}else{
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				}
				if($this->user_model->userTypebyid($userid) == 1){
					$this->merchant_model->_delcontentmerchant($id,$userid,1);
					redirect('cp/merchantcontent');
				}else{
					$this->merchant_model->_delcontentmerchant($id,$userid);
					redirect('cp/merchantcontent');
				}

			}
		}

		public function merchantcate(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$config['base_url'] = site_url('cp/merchantcate');
				$config['total_rows'] = $this->merchant_model->_totalrows();
				$config['per_page'] = 20;
				$this->pagination->initialize($config);
				$data['merchantcates']=$this->merchant_model->showallcatemerchant($config['per_page'],$this->uri->segment(3));
				$data['page'] = $this->pagination->create_links();
				$this->load->view('cp/index',$data);
			}
		}
		public function merchantcateadd(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				if (isset($_REQUEST['submit'])) {
					$name = $this->input->post('name',true);
					$active = $this->input->post('active',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					if($this->merchant_model->checkcate($name) == true){
						$this->merchant_model->add_cate_merchant($name,$active);
						redirect('cp/merchantcate');
					}	else {
						redirect('cp/merchantcateadd');
					}
				}
				$this->load->view('cp/index');
			}
		}

		public function merchantinfo(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				$data['merchantinfos'] = $this->merchant_model->merchantid($userid);
				$this->load->view('cp/index',$data);
			}
		}

		function ajaxmerchantcontent($id){
			$this->load->model('merchant_model');
			$contentmerch = $this->merchant_model->showmerchantcontentbyadmin($id);

			foreach($contentmerch as $row){
				echo  '<tr class="odd gradeX">';
				echo '<td>'.$row->id.'</td>';
				echo '<td>'.$row->name.'</td>';
				echo '<td>'.$row->catename.'</td>';
				echo '<td>'.$this->merchant_model->returnmerchantuserbyid($row->userid).'</td>';
				echo '<td>';
				if($row->active == 1){
					echo "<a href='" .site_url('cp/statuscontent').'/'.$row->id."/0'>Dừng </a>";
				}else {
					echo "<a href='" .site_url('cp/statuscontent').'/'.$row->id."/1'>Kích hoạt </a>";
				}
				echo '</td>';
				echo '<td><a href="'.site_url('cp/updatemerchantcontent').'/'.$row->id.'">Sửa</a> &nbsp;|&nbsp; <a href="'.site_url('cp/delmerchantcontent').'/'.$row->id.'">Xóa</a></td>';
					
			}
		}

		public function statuscontent($id,$active){
			$this->load->model('merchant_model');
			$this->merchant_model->updateastatusmercontent($id,$active);
			redirect('cp/merchantcontent');
		}

		public function merchantcontent(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				$userid = 0;
				if($this->session->userdata('uroot') <> 0 ) {
					$userid = $this->session->userdata('uroot');
				}else{
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				}
				$config['base_url'] = site_url('cp/merchantcontent');
				$config['total_rows'] = $this->merchant_model->totalmerchantcontent($userid);
				$config['per_page'] = 15;
				$this->pagination->initialize($config);

				if($this->user_model->userTypebyid($userid) == 1){

					$data['merchantcontents'] = $this->merchant_model->show_merchant_content(0,$config['per_page'],$this->uri->segment(3));
				}else{

					$data['merchantcontents'] = $this->merchant_model->show_merchant_content($userid,$config['per_page'],$this->uri->segment(3));
				}
				$data['usertype'] = $this->user_model->userTypebyid($userid);
				$data['pages'] = $this->pagination->create_links();
				$data['showcates']= $this->merchant_model->showallcatemerchantall();
				$this->load->view('cp/index',$data);
			}
		}

		function strip_html_tags( $text ) 
		{ 
		    $text = preg_replace( 
		        array( 
		          // Remove invisible content 
		            '@<head[^>]*?>.*?</head>@siu', 
		            '@<style[^>]*?>.*?</style>@siu', 
		            '@<script[^>]*?.*?</script>@siu', 
		            '@<object[^>]*?.*?</object>@siu', 
		            '@<embed[^>]*?.*?</embed>@siu', 
		            '@<applet[^>]*?.*?</applet>@siu', 
		            '@<noframes[^>]*?.*?</noframes>@siu', 
		            '@<noscript[^>]*?.*?</noscript>@siu', 
		            '@<noembed[^>]*?.*?</noembed>@siu', 
		          // Add line breaks before and after blocks 
		            '@</?((address)|(blockquote)|(center)|(del))@iu', 
		            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu', 
		            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu', 
		            '@</?((table)|(th)|(td)|(caption))@iu', 
		            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu', 
		            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu', 
		            '@</?((frameset)|(frame)|(iframe))@iu', 
		        ), 
		        array( 
		            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',"$0", "$0", "$0", "$0", "$0", "$0","$0", "$0",), $text ); 
		      
		    return  strip_tags( $text , '' ); 
		} 

		public function addmerchantcontent(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$name =  $this->input->post('name',true);
					$active = $this->input->post('active',true);
					$des =  $this->strip_html_tags($this->input->post('des',true)); 
					$cateid = $this->input->post('cate',true);
					$link = $this->input->post('link',true);
					$langid= $this->input->post('langid',true);
					$usermerchantid = $this->input->post('usermerchantid',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					//base_url().'uploads/'
					$this->load->model('merchant_model');
					$catename= $this->merchant_model->returncatenamebyid($cateid);

					$this->load->model('user_model');
					$userid = 0;
					if($this->session->userdata('uroot') <> 0 ) {
						$userid = $this->session->userdata('uroot');
					}else{
						$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
					}
					if($this->session->userdata('utype') ==1  ) {
						if($usermerchantid <> 0) {
							$this->merchant_model->_addcontentmerchant($name,$cateid,$image,$active,$catename,$des,$langid,$usermerchantid);
						}else{
							$this->merchant_model->_addcontentmerchant($name,$cateid,$image,$active,$catename,$des,$langid,$userid);
						}
					}else{
						$this->merchant_model->_addcontentmerchant($name,$cateid,$image,$active,$catename,$des,$langid,$userid);
					}

					redirect('cp/merchantcontent');
				}
				$this->load->model('merchant_model');
				if($this->session->userdata('utype') ==1  ) {
					$data['allactmerchants'] = $this->merchant_model->showallmerchantmod();
				}else {
					$data['allactmerchants'] = null;
				}

				$data['caties'] = $this->merchant_model->showmerchantcate();
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$this->load->view('cp/index',$data);
			}
		}

		public function updatemerchantcontent($id){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$name = $this->_locTiengviet($this->input->post('name',true));
					$active = $this->input->post('active',true);
					$des =  $this->_locTiengviet($this->input->post('des',true));
					$cateid = $this->input->post('cate',true);
					$link = $this->input->post('link',true);
					$langid= $this->input->post('langid',true);
					if($active == 'on'){
						$active = 1;
					}else {
						$active = 0;
					}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					$this->load->model('category');
					$this->load->model('user_model');
					$this->load->model('merchant_model');
					$catename= $this->merchant_model->returncatenamebyid($cateid);
					$userid = 0;
					if($this->session->userdata('uroot') <> 0 ) {
						$userid = $this->session->userdata('uroot');
					}else{
						$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
					}
					if($this->user_model->userTypebyid($userid) == 1){
						$this->merchant_model->_updatecontentmerchantroot($id,$name,$cateid,$image,$active,$catename,$des,$langid,0);
					}else{
						$this->merchant_model->_updatecontentmerchant($id,$name,$cateid,$image,$active,$catename,$des,$langid,$userid);
					}

					redirect('cp/merchantcontent');
				}
				$this->load->model('merchant_model');
				$this->load->model('user_model');
				$userid = 0;
				if($this->session->userdata('uroot') <> 0 ) {
					$userid = $this->session->userdata('uroot');
				}else{
					$userid= $this->user_model->returnUserID($this->session->userdata('authen'));
				}
				if($this->user_model->userTypebyid($userid) == 1){
					$data['merchantcontents'] = $this->merchant_model->showmerchantcontentbyuserid($id,0);
				}else{
					$data['merchantcontents'] = $this->merchant_model->showmerchantcontentbyuserid($id,$userid);
				}

				$this->load->model('category');
				$data['caties'] = $this->merchant_model->showmerchantcate();
				$this->load->model('lang_model');
				$data['languies']= $this->lang_model->_showlang();
				$data['id']= $id;
				$this->load->view('cp/index',$data);
			}
		}

		/*
		 * Config  ************************************************************************
		 */

		public function config($notify=null){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if(isset($_REQUEST['submit'])){
					$sitename = $this->input->post('sitename',true);
					$hotnewcount = $this->input->post('hotnewcount',true);
					$artcilemerchantcount = $this->input->post('artcilemerchantcount',true);
					$newmerchantcount = $this->input->post('newmerchantcount',true);
					$commentmerchantcount = $this->input->post('commentmerchantcount',true);
					$meta = $this->input->post('meta',true);
					$des = $this->input->post('des',true);
					$this->load->model('config_model');
					$this->config_model->update(1,$hotnewcount,$sitename,$newmerchantcount,$artcilemerchantcount,$commentmerchantcount,$meta,$des);
					redirect('cp/config'.'/success');
				}
				if($notify == null){
					$data['notify']="";
				}elseif($notify == "success"){
					$data['notify']="<h2><font color='red'>Cập nhật thành công !</font></h2>";
				}
				$this->load->model('config_model');
				$config['base_url'] = site_url('cp/config');
				$config['total_rows'] = $this->config_model->_totalrows();
				$config['per_page'] = 20;
				$this->pagination->initialize($config);
				$data['configs']=$this->config_model->_showconfig();
				$data['page'] = $this->pagination->create_links();
				$this->load->view('cp/index',$data);
			}
		}
		public function configinsert(){
			if($this->session->userdata('authen') == null ){
				redirect('cp/checkAuthen');
			} else {
				if (isset($_REQUEST['submit'])) {
					$name = $this->input->post('name',true);
					$active = $this->input->post('active',true);
					$des =  $this->input->post('des',true);
					$cateid = $this->input->post('cate',true);
					$link = $this->input->post('link',true);
					if($active == 'on'){
						$active = 1;
					}else {$active = 0;}
					$mypath= "./uploads";
					$image=  $this->do_upload_image($mypath,'fileimage');
					//base_url().'uploads/'
					$this->load->model('content');
					$this->load->model('category');
					$catename=$this->category->_showcatenamebyid($cateid);

					//$this->config_model->_addcontent($userid,$name,$cateid,$catename,$des,$link,$image,$active);
					redirect('cp/content');
				}
			}
		}

		/*
		 * Upload  ************************************************************************
		 */
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

		//		public function do_upload_file($mypath,$filename){
		//			$config['upload_path'] = $mypath;
		//		}

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
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
