<?php if(isset($id)):?>
<?php foreach($caties as $cate):?>
<?php echo form_open_multipart('cp/cateupdate/'.$id); ?>
<?php if($cate->active == 1):?>
Active:
<input
	type="checkbox" id="active" name="active" checked="checked" />
&nbsp;
<?php else:?>
Active:
<input
	type="checkbox" id="active" name="active" />
&nbsp;
<?php endif;?>
<br />
<br />
Name:
<input
	type="text" id='name' value='<?php echo $cate->name?>' name='name' />
&nbsp;
<br />
<br />
Image:
<input type="file"
	id="fileimage" name="fileimage" />
&nbsp;&nbsp;
<br />
<br />
<img
	src="<?php echo base_url().'uploads/'.$cate->image;?>" alt="null"
	width="50px" height="50px" />
&nbsp;
<br />
<br />
<input
	type="submit" name="submit" id="submit" value="Submit" />
<br />
<br />
<?php echo form_close();?>
<?php endforeach;?>
<?php endif;?>