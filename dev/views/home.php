<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIVOVIETNAM - 2012</title>
<link href="<?php echo base_url('css/style.css')?>" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/icon.ico" />
<!--
  jQuery library
-->
<script type="text/javascript" src="<?php echo base_url('js/jquery-1.4.2.min.js')?>"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="<?php echo base_url('js/jquery.jcarousel.min.js')?>"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/skin.css')?>" />
<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#autocontentslide').jcarousel({
    	vertical: true,
        auto: 4,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

</script>
</head>

<body>
<!--<div style="clear:both; width:100%;">
	<div style="width:25%;float:left;padding-left:200px; ">
		Portal News
	</div>
	<div style="width:25%;float:right; ">
		<?php foreach($langs as $lang):?>
			<a href="<?php echo base_url().'index.php/home/lang/'.$lang->name;?>"><img src="<?php echo base_url(); ?>images/<?php echo $lang->name?>.jpg" alt="" width="30" height="18" /></a> &nbsp;
		<?php endforeach;?>
	</div> 
</div>
--><div id="headerbg">

  <div id="headerblank">
    <div id="header">
      <div id="menu">
        <ul><!--
          <?php foreach($danhmucmenu as $menu):?>
              <?php if($menu->menulink == null): ?>
                 <li><a class="menu" href="<?php echo base_url()?>" ><?php echo $menu->menuname; ?></a></li>
              <?php elseif($menu->menulink == -1): ?>
              	  <li><a class="menu" href="<?php echo base_url().'index.php/home/merchant';?>" >Services</a></li>
              <?php else:?>
                  <li><a class="menu" href="<?php echo base_url().'index.php/home/cate/'.$menu->menulink; ?>" ><?php echo $menu->menuname; ?></a></li>
              <?php endif;?>
            <?php endforeach; ?>
             -->
             <li><a class="menu" href="<?php echo base_url();?>" >Home</a></li>
             <li><a class="menu" href="<?php echo base_url().'index.php/home/merchant';?>" >Services</a></li>
              <li><a class="menu" href="<?php echo site_url('home/partner')?>" >Partner</a></li>
	          <li><a href="<?php echo site_url('home/contact_form')?>" class="menu">Contact</a></li>
	          <li><a href="<?php echo site_url('home/register')?>" class="menu">Register</a></li>
		   	 <li><a href="<?php echo site_url('cp')?>" class="menu">Login</a></li>
        </ul>
      </div>
        
    </div>
  </div>
</div>
<div id="contentbg">
  <div id="contentblank">
    <div id="content">
      <div id="contentleft">
        <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">Category</span> 
			</span>
        </div>
        <div id="leftnav">
          <ul> 
			<?php foreach($categories as $catemenu): ?>
				<li><a href="<?php echo base_url().'index.php/home/mndc/'.$catemenu->id; ?>" class="leftnav"><?php echo $catemenu->name;?></a></li>
			<?php endforeach;?>  
          </ul>
        </div>
       <div class="clear"></div>
        <!-- ------------New member ------------- -->
        <div id="leftheading" >
          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">New Merchants</span> 
			</span>
        </div>
        <div id="leftnav">
           
			<?php foreach($merchantusernew as $user):?>
			<div class="imagemerchant">
			  <a href="<?php echo site_url('home/mrts').'/'.$user->userid;?>" class="leftnavmer">
			 	<img width="83px" height="36px" src="<?php echo base_url('uploads/'.$user->logo)?>" /></a>
			 </div> 
			<?php endforeach;?> 
        </div> 
        <div class="clear"></div>
        <!-- ------------New comment ------------- -->
        <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">New Comments</span> 
			</span>
        </div>
       <?php foreach($topcomments as $topcomment):?>
        <div class="lefttxtblank02">
           
          <div class="leftboldtxtblank">
           	<div class="morebutton"><a href="<?php echo site_url('home/mnd').'/'.$topcomment->contentid;?>" class="more"><?php echo substr($topcomment->contentname,0,30) ;?></a></div>
           
          </div>
          <div class="leftnormaltxt"><?php echo substr($topcomment->message,0,100) ;?></div>
           <div class="lefttxt"><?php echo $topcomment->name;?>&nbsp;|&nbsp;<?php echo $topcomment->timecreate;?></div>
          
        </div>
        <?php endforeach;?>
      </div>
      <div id="contentmid"> 
       		<?php if($this->router->fetch_method() == 'index'):?>
				<?php $this->load->view('portletleft');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'merchant'):?>
				<?php $this->load->view('merchant');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'cate'):?>
				<?php $this->load->view('category');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'add_comment'):?>
				<?php $this->load->view('thank');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'mnd'):?>
				<?php $this->load->view('contentdetails');?>
			<?php endif;?> 
			<?php if($this->router->fetch_method() == 'mndc'):?>
				<?php $this->load->view('mndc');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'contact_form'):?>
				<?php $this->load->view('contact_form');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'register'):?>
				<?php $this->load->view('register');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'partner'):?>
				<?php $this->load->view('partner');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'search'):?>
				<?php $this->load->view('search_result');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'mrts'):?>
				<?php $this->load->view('merchantdetails');?>
			<?php endif;?>
			<?php if($this->router->fetch_method() == 'mrtsc'):?>
				<?php $this->load->view('merchantdetailscontent');?>
			<?php endif;?>
			 
      </div>
 
      <div id="contentright"> 
      	 <?php if($this->router->fetch_method() <> 'search'):?>
      	 
       <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold;">Search</span> 
			</span>
        </div>
        <div id="galleryblank">
        	<?php echo form_open_multipart('home/search'); ?>
        	<select name="searchtype">
        		<option value="1">Merchant Information</option>
        		<option value="2" selected>Content in site</option>
        	</select><br/>
        	<input type="text" value="" name="keyword" /><br/>
        	<span style="float:right;padding-right:25px;"><input type="submit" value="Search" name="submit" id="submit" /></span><br/><br/>
        	<?php echo form_close(); ?> 
        </div>
        <?php endif;?>
         <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">News</span> 
			</span>
        </div>
          <div class="righttxt">
          	<ul id="autocontentslide" class="jcarousel jcarousel-skin-tango" >
          		<?php foreach($newmercontents as $row):?>
			     <li class="rightcontenttxt" >
				 	<b>*</b> <a href="<?php echo site_url('home/mnd/'.$row->id)?>"><?php echo substr($row->name,0,30) ;?></a>   
				 	 
				</li> 
				<?php endforeach;?>
			  </ul>
         </div>
         <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold;">Most viewed news</span> 
			</span>
        </div>
        <div id="galleryblank2"> 
          <ul> 
			<?php foreach($contenthots as $content):?>
			 <li><a href="<?php echo site_url('home/mnd').'/'.$content->id;?>">
			 	<?php echo $content->name;?></a>
			 </li> 
			<?php endforeach;?>
          </ul>  
        </div> 
      </div>
    </div>
  </div>
  

</div>

<div id="footerbg">
  <div id="footerblank">
    	<div style="font-family: Verdana;float:left;font-size:12px;width:55%;color:#F4E7BD;padding-left:50px;padding-top:45px;">
      	  Online Gateway Service of OnePay<br/>
      	 © Copyright by OnePay JSC 2012. All Rights Reserved. <br/><br/>
      	 <img src="http://202.9.84.78/onepay/images/stories/logo_website.png" width="434" height="30" alt="logo"/>
      </div>
      
  </div>
</div>
</body>
</html>
