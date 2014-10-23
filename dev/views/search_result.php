<p><?php echo form_open_multipart('home/search'); ?> <select
	name="searchtype" >
	<option value="1">Merchant Information</option>
	<option value="2" selected>Content in site</option>
</select><br /><br />
<input type="text" value="" name="keyword" id="keyword" size="40"/> 
<input type="submit" value="Search now" name="searchcontent" id="searchcontent" /> 
<?php echo form_close(); ?></p>

 
<div class="midtxt" style="width:100%;">
Results that match with your keyword:
<?php foreach($searchresults as $result):?>

 <p>
 <span class="rightcontenttxt"> <a class="leftnav" href="<?php echo site_url('home/mnd/'.$result->id)?>"><?php echo $result->name;?></a></span>
 <br/><span class="lefttxt"><?php echo $result->createdate;?></span><br/>
 </p> 
<?php endforeach;?>
</div>

 