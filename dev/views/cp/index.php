<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery --> 
    <script src="<?php echo base_url(); ?>src_adm/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="<?php echo base_url(); ?>src_adm/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>src_adm/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>src_adm/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>src_adm/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src_adm/css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/jquery.jqplot.min.js"></script>
    <script  type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="<?php echo base_url(); ?>src_adm/js/setup.js" type="text/javascript"></script> 
 <script  type="text/javascript" src='<?php echo base_url(); ?>editor/scripts/innovaeditor.js'></script>
 

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <a href="<?php echo site_url();?>"> <img src="<?php echo base_url(); ?>src_adm/img/logo.gif" alt="Logo" /></a></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="<?php echo base_url(); ?>src_adm/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Xin chào <b><?php echo $this->session->userdata('authen'); ?></b></li> 
                            <li ><a href="<?php  echo site_url('cp/checkout');?>">Logout </a></li>
                        </ul>
                        <br />
                        <span class="small grey"> </span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
            	<?php if($this->session->userdata('utype') == 1): ?>
                <?php $this->load->view('cp/menu_admin');?>
				<?php elseif($this->session->userdata('utype') == 3):?>
				 <?php $this->load->view('cp/menu_user'); ?>
				 <?php elseif($this->session->userdata('utype') == 2):?>
				 <?php $this->load->view('cp/menu_mod'); ?>
				 <?php else:?>
				 <?php redirect('cp/index');?>
				<?php endif;?>
				<li ><a href="<?php  echo site_url('cp/checkout');?>">Thoát </a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem"></a>
                            <ul class="submenu">
			                    <?php if($this->router->fetch_method() == 'cate'):?>
			                 
		                        <li><a href="<?php  echo site_url('cp/add_cate');?>" class="add">Thêm mới</a></li>
		                         <?php elseif($this->router->fetch_method() == 'merchantcate'):?>
		                      
		                        <li><a href="<?php  echo site_url('cp/merchantcateadd');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'merchantcontent'):?>
		                      
		                        <li><a href="<?php  echo site_url('cp/addmerchantcontent');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'content'):?>
		                        <li><a href="<?php  echo site_url('cp/add_content');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'merchant'):?>
		                        <li><a href="<?php  echo site_url('cp/add_merchant');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'merchantmember'):?>
		                       <li><a href="<?php  echo site_url('cp/add_merchantmember');?>" class="add">Thêm mới</a></li>
		                       <?php elseif($this->router->fetch_method() == 'banner'):?>
		                       <li><a href="<?php  echo site_url('cp/add_banner');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'room'):?>
		                        <li><a href="<?php  echo site_url('cp/add_room');?>" class="add">Thêm mới</a></li>
		                       <?php elseif($this->router->fetch_method() == 'menu'):?>
		                        <li><a href="<?php  echo site_url('cp/add_menu');?>" class="add">Thêm mới</a></li>
		                        <?php elseif($this->router->fetch_method() == 'intro'):?>
		                        <li><a href="<?php  echo site_url('cp/addintro');?>" class="add">Thêm mới</a></li> 
		                        <?php elseif($this->router->fetch_method() == 'user'):?>
		                        <li><a href="<?php  echo site_url('cp/adduser');?>" class="add">Thêm mới</a></li>
		                         <?php elseif($this->router->fetch_method() == 'role'):?>
		                        <li><a href="<?php  echo site_url('cp/addrole');?>" class="add">Thêm mới</a></li>
		                         <?php elseif($this->router->fetch_method() == 'merchant'):?>
<!--		                        <li><a href="<?php  echo site_url('cp/catemerchant');?>" class="add">Danh mục trang</a></li>-->
<!--		                        <li><a href="<?php  echo site_url('cp/newmerchant');?>" class="add">Bài viết</a></li>-->
<!--		                        <li><a href="<?php  echo site_url('cp/infomerchant');?>" class="add">Cấu hình merchant</a></li>-->
		                        <?php endif;?>
                            </ul>
                        </li>
                         
<!--                         <li><a href="<?php  echo site_url('cp/room');?>">Phòng</a></li>-->
<!--						 <li class="ic-charts"><a href="<?php  echo site_url('cp/booking');?>"><span>Đặt phòng</span> </a></li>-->
						
						 
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                	<?php if($this->router->fetch_method() == 'cate') { ?> 
	                	Danh mục hệ thống 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_cate') { ?> 
	                       Thêm mới danh mục hệ thống 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'content') { ?> 
	                        Quản lý nội dung 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_content') { ?> 
	                        Thêm mới nội dung 
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'contentupdate') { ?> 
	                        Sửa đổi nội dung 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'config') { ?> 
	                        Quản lý cấu hình 
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'contype') { ?>  
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'user') { ?>  
	                		Thành viên hệ thống
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'lang') { ?> 
	                        Quản lý ngôn ngữ hệ thống 
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'roomtype') { ?> 
	                      Quản lý các đặc trưng 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'listimage') { ?> 
	                       Danh sách hình ảnh 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'banner') { ?> 
	                        Quản lý banner quảng cáo 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_banner') { ?> 
	                        Thêm mới quảng cáo 
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'menu') { ?> 
	                        Quản lý menu 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_menu') { ?> 
	                        Thêm mới menu
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'intro') { ?> 
	                         
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'addintro') { ?> 
	                         
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'updateintro') { ?> 
	                        
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'merchantuserdetails') { ?> 
	                        Thông tin chi tiết merchant
	                <?php } ?> 
	              
	                <?php if($this->router->fetch_method() == 'adduser') { ?> 
	                        Thêm mới thành viên 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'edituser') { ?> 
	                       Sửa đổi thông tin thành viên 
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'addmember') { ?> 
	                        Thêm mới thành viên hệ thống 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'role') { ?> 
	                       Quản lý quyền user 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'roleinfo') { ?> 
	                        Quản lý quyền trong hệ thống 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'editcate') { ?> 
	                        Sửa đổi danh mục hệ thống 
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantinfo') { ?> 
	                        Thông tin merchant
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchant') { ?> 
	                        Quản lý merchant 
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantcate') { ?> 
	                        Quản lý  Merchant Category
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchantcontent') { ?> 
	                        Quản lý nội dung merchant 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchantmember') { ?> 
	                        Thêm mới thành viên merchant 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'addmerchantcontent') { ?> 
	                       Thêm mới nội dung merchant 
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'updatemerchantcontent') { ?> 
	                       Cập nhật nội dung merchant 
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantcateadd') { ?> 
	                        Thêm mới Category cho Merchant
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'prterimagehome') { ?> 
	                         Quản lý quảng cáo  banner bottom 
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchanthot') { ?> 
	                        Thiết lập merchant Hot 
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'add_merchant') { ?> 
	                        Tạo mới Merchant
	                <?php } ?>
                </h2>
                <div class="block">
                    <div id="chart2">
                     
                    <?php if($this->router->fetch_method() == 'checkAuthen') { ?> 
	                <?php $this->load->view('cp/login');?>
	                <?php } ?>
                    <?php if($this->router->fetch_method() == 'cate') { ?> 
	                <?php $this->load->view('cp/cate');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_cate') { ?> 
	                        <?php $this->load->view('cp/add_cate');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'content') { ?> 
	                        <?php $this->load->view('cp/content');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_content') { ?> 
	                        <?php $this->load->view('cp/add_content');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'contentupdate') { ?> 
	                        <?php $this->load->view('cp/edit_content');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'config') { ?> 
	                        <?php $this->load->view('cp/config');?>
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'contype') { ?> 
	                        <?php $this->load->view('cp/type');?>
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'user') { ?> 
	                        <?php $this->load->view('cp/user');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'lang') { ?> 
	                        <?php $this->load->view('cp/lang');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'roomtype') { ?> 
	                        <?php $this->load->view('cp/roomtype');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'listimage') { ?> 
	                        <?php $this->load->view('cp/images');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'banner') { ?> 
	                        <?php $this->load->view('cp/banner');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_banner') { ?> 
	                        <?php $this->load->view('cp/add_banner');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'room') { ?> 
	                        <?php $this->load->view('cp/room');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_room') { ?> 
	                        <?php $this->load->view('cp/add_room');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'updateroom') { ?> 
	                        <?php $this->load->view('cp/updateroom');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'menu') { ?> 
	                        <?php $this->load->view('cp/menu');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'add_menu') { ?> 
	                        <?php $this->load->view('cp/add_menu');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'intro') { ?> 
	                        <?php $this->load->view('cp/intro');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'addintro') { ?> 
	                        <?php $this->load->view('cp/add_intro');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'updateintro') { ?> 
	                        <?php $this->load->view('cp/updateintro');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'booking') { ?> 
	                        <?php $this->load->view('cp/booking');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchantuserdetails') { ?> 
	                        <?php $this->load->view('cp/merchantdetails');?>
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'bookdetail') { ?> 
	                        <?php $this->load->view('cp/bookdetail');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'adduser') { ?> 
	                        <?php $this->load->view('cp/adduser');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'edituser') { ?> 
	                        <?php $this->load->view('cp/edituser');?>
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'addmember') { ?> 
	                        <?php $this->load->view('cp/addmember');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'role') { ?> 
	                        <?php $this->load->view('cp/userrole');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'roleinfo') { ?> 
	                        <?php $this->load->view('cp/roleinfo');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'editcate') { ?> 
	                        <?php $this->load->view('cp/edit_cate');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantinfo') { ?> 
	                        <?php $this->load->view('cp/merchantinfo');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchant') { ?> 
	                        <?php $this->load->view('cp/merchant');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantcate') { ?> 
	                        <?php $this->load->view('cp/merchantcate');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchantcontent') { ?> 
	                        <?php $this->load->view('cp/merchantcontent');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchantmember') { ?> 
	                        <?php $this->load->view('cp/merchantmember');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'addmerchantcontent') { ?> 
	                        <?php $this->load->view('cp/addmerchantcontent');?>
	                <?php } ?> 
	                <?php if($this->router->fetch_method() == 'updatemerchantcontent') { ?> 
	                        <?php $this->load->view('cp/updatemerchantcontent');?>
	                <?php } ?>
	                 <?php if($this->router->fetch_method() == 'merchantcateadd') { ?> 
	                        <?php $this->load->view('cp/add_cate_merchant');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'prterimagehome') { ?> 
	                        <?php $this->load->view('cp/prterimagehome');?>
	                <?php } ?>
	                <?php if($this->router->fetch_method() == 'merchanthot') { ?> 
	                        <?php $this->load->view('cp/merchanthot');?>
	                <?php } ?>
	                
	                <?php if($this->router->fetch_method() == 'add_merchant') { ?> 
	                        <?php $this->load->view('cp/add_merchant');?>
	                <?php } ?>
                    </div>
                </div>
            </div>
            <div class="box round">
                <h2>Hệ thống cảnh báo</h2>
                <div class="block">
                	Tổng số bài viết: <b>234</b> bài<br/>
                    Số người đang online: <b>1023</b> người<br/>
                    Số người đang sửa bài viết: <b>257</b> người<br/>
                    Số lượng ảnh trên hệ thống: <b>31</b> files <br/>
                    Thành viên đang online: <b>12</b> người<br/>
                                        
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">SonPham</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
