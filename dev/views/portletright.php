<h2>New Merchant</h2>
<div class="right_articles">
<?php foreach($merchantusernew as $user):?>
 <b><?php echo $user->username;?></b><br />
 <?php echo $user->createdate;?>
<?php endforeach;?>
</div>
<h2>New Article</h2>
<?php foreach($merchantnew as $merchant):?>
<div class="right_articles">
<p>
<?php if($merchant->image == null):?>
<img src="<?php echo base_url().'images/image.gif'?>" width="60px" height="60px" alt="Image" title="Image"
	class="image" />
	<?php else:?>
<img src="<?php echo base_url().'uploads/'.$merchant->image; ?>" width="60px" height="60px" alt="Image" title="Image"
	class="image" />	
	<?php endif;?> 
	<b><a href="<?php echo site_url('home/mnd/'.$merchant->id)?>" class="title"><?php echo $merchant->name?></a></b><br />
<?php echo substr($merchant->des,0,250) ;?>.</p>
</div>
<?php endforeach;?>
<div class="notes">
<p>Contact now</p>
</div>
