<div class="midtxt">
<?php foreach($allcontents as $content):?>
<div class="block" style="padding-bottom:20px;">
<h4><a href="<?php echo site_url('home/mnd/'.$content->id)?>" class="title"><?php echo $content->name?></a></h4>
<p><?php echo substr($content->des,0,250) ;?></p>
<img src="<?php echo base_url().'uploads/'.$content->image;?>" alt=""
	width="304" height="207" class="map" /><br />
</div>
<?php endforeach;?>

</div>



