 <div class="midtxt">
 <h4><?php echo $thiscatename;?></h4><br/> 
<?php echo $page;?>
<br/>
<?php foreach($contents as $content):?>
<div class="block" style="padding-bottom:20px; width:450px;">
	
	<table>
		<tr>
			<td>
				<?php if($content->image <> null ):?>
				<p><img src="<?php echo base_url().'uploads/'.$content->image;?>" alt="" width="150px" height="150px" class="map" /></p>
				<?php else:?> 
				<p><img src="<?php echo base_url().'uploads/defaultimage.jpg.jpg';?>" alt="" width="150px" height="150px" class="map" /></p>
				<?php endif;?>
			</td>
			<td>
				<h4><a href="<?php echo site_url('home/mnd/'.$content->id)?>" class="title"><?php echo $content->name?></a></h4>
 				<p><?php echo substr($content->des,0,180) ;?> </p>
			</td>
		</tr>
	</table>
	
	
 	 
</div>
<?php endforeach;?> 
<br/>
<p><?php echo $page;?></p>

</div>



