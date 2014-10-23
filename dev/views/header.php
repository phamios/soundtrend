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
    jQuery('#autocontentslide2').jcarousel({ 
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
        <br/><br/>
         <!-- ------------New member ------------- -->
       <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">New merchants</span> 
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
        
        <div id="leftnav">
        &nbsp;
        </div>
        <!-- ------------New comment ------------- -->
         <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold;">New comments</span> 
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