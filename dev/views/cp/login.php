<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>ONE|GATE ADMIN</title>
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
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script  type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script  type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script   type="text/javascript" src="<?php echo base_url(); ?>src_adm/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="<?php echo base_url(); ?>src_adm/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
    tinyMCE.init({
            theme : "advanced",
            mode : "textareas"
    });
    </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="<?php echo base_url(); ?>src_adm/img/logo.gif" alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="<?php echo base_url(); ?>src_adm/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10"> 
                        <span class="small grey"> </span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
       
        <div class="clear">
        </div>
        
 		<div class="grid_5">
 			 
            <div class="box round" style="padding-left:30px;">
            	<?php echo form_open_multipart('cp/checkAuthen'); ?>
            	<table>
            		<tr>
            			<td></td>
            			<td><?php echo $errormess;?></td>
            		</tr>
            		<tr>
            			<td>Tên đăng nhập: &nbsp; &nbsp; &nbsp; </td>
            			<td><input type="text" name="tendangnhap" id="tendangnhap" /></td>
            		</tr>
            		<tr>
            			<td>Mật khẩu: </td>
            			<td><input type="password" name="matkhau" id="matkhau" /></td>
            		</tr>
            		<tr>
            			<td>Login theo: </td>
            			<td><select name="quyenhan" id="quyenhan">
							<option value="1">Admin</option>
							<option value="2">Quản trị viên Merchant</option>
							<option selected value="3">Merchant</option> 
						</select></td>
            		</tr>
            		<tr>
            			<td>
            			</td>
            			<td>
            			 	<?php echo $captcha;?>
            			</td>
            		</tr>
            		<tr>
            			<td></td>
            			<td><input type="submit" id="submit" name="submit" value="Login"/></td>
            		</tr>
            	</table>
               <?php echo form_close(); ?>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">Microtec</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
