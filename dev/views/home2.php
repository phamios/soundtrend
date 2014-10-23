<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<meta name="description" content="My Site" />
	<meta name="keywords" content="key, words" />	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style2.css')?>" media="screen" />
	<title>ONE GATE &middot; We share the relevant.</title>
</head>
<body>
	<div id="content">
		<div id="top_info">
			<p> <?php foreach($langs as $lang):?>
                        <a href="<?php echo base_url().'index.php/home/lang/'.$lang->name;?>"><img src="<?php echo base_url(); ?>images/<?php echo $lang->name?>.jpg" alt="" width="30" height="18" /></a> &nbsp;
                    <?php endforeach;?><br />
			<b> <a href="<?php echo site_url('cp');?>">Đăng nhập </a> </b>hệ thống .</p>
		</div>
		
		<div id="logo">
			<h1><a href="#" title="We share the relevant.">One Gate</a></h1>
			<p id="slogan">We share the relevant.</p>
		</div>
				
		<ul id="tablist">
			<?php foreach($danhmucmenu as $menu):?>
              <?php if($menu->menulink == null): ?>
                 <li><a href="<?php echo base_url()?>" ><?php echo $menu->menuname; ?></a></li>
              <?php elseif($menu->menulink == -1): ?>
              	  <li><a href="<?php echo base_url().'index.php/home/merchant';?>" ><?php echo $menu->menuname; ?></a></li>
              <?php else:?>
                  <li><a href="<?php echo base_url().'index.php/home/cate/'.$menu->menulink; ?>" ><?php echo $menu->menuname; ?></a></li>
              <?php endif;?>
            <?php endforeach; ?>
            <li><a href="<?php echo site_url('home/contact_form')?>" >Liên hệ </a></li>
            <li><a href="<?php echo site_url('home/register')?>" >Đăng ký </a></li>
            <li><a href="<?php echo site_url('cp')?>" >Provider Login </a></li>
		</ul>
		
		<div id="topics"> 
			<?php if($this->router->fetch_method() == 'register'):?>
				Danh mục dịch vụ: &nbsp;&nbsp;&nbsp;
			<?php endif;?>
			<?php $count = 1;?>
			<?php foreach($childmenus as $childmenu): ?>
				<?php if($count % 10 !=0 ):?> 
						<a href="<?php echo base_url().'index.php/home/mndc/'.$childmenu->id; ?>"><?php echo $childmenu->name;?></a> &nbsp;&nbsp;
					<?php else:?>
						<a href="<?php echo base_url().'index.php/home/mndc/'.$childmenu->id; ?>"><?php echo $childmenu->name;?></a> &nbsp;&nbsp; <br/>
				<?php endif;?>
			<?php $count = $count + 1;?>
			<?php endforeach;?> 
		</div>
		<div id="search">
			<?php echo form_open_multipart('home/search'); ?>
				<p><input type="text" name="search" class="search" /> <input type="submit" name="searchnow" value="Search" class="button" /></p>
			<?php echo form_close(); ?>
		</div>
							
		<div id="left">
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
			<?php if($this->router->fetch_method() == 'search'):?>
				<?php $this->load->view('search_result');?>
			<?php endif;?>
		</div>	
		
		<div id="right">
			<?php $this->load->view('portletright');?>
		</div>
		<div style="clear:both;text-align:center;">
			<img src="http://vietcraft.com/images/cardlogos5.gif" />
		</div>
		<div id="footer">
			<p class="right">&copy; 2006 Internet Broadcast, Design: Luka Cvrk - <a href="http://www.solucija.com/" title="Information Architecture and Web Design">Solucija</a> 
			| <a href="http://www.ehostinfo.com/">Web Hosting</a></p>
			<p><a href="#">RSS Feed</a> &middot; <a href="#">Contact</a> &middot; <a href="#">Accessibility</a> &middot; <a href="#">Products</a> &middot; <a href="#">Disclaimer</a> &middot; <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> and <a href="http://validator.w3.org/check?uri=referer">XHTML</a><br /></p>
			
		</div>
	</div>
</body>
</html>