<p>
<?php if(isset($id)):?>
<?php foreach($tyies as $type):?>
<?php echo form_open_multipart('cp/contype/0/'.$id); ?>
<?php if($type->active == 1):?>
	Active: <input type="checkbox" id="active"  name="active" checked="checked" />&nbsp;
<?php else:?>
	Active: <input type="checkbox" id="active"  name="active" />&nbsp;
<?php endif;?>	
	Name: <input type="text" id='name' value='<?php echo $type->name?>' name='name' /> &nbsp; 
	<input type="submit" name="submit" id="submit" value="Submit" />
<?php echo form_close();?>

<?php endforeach;?>
<?php else:?>
<?php echo form_open_multipart('cp/typeinsert'); ?>
	Active: <input type="checkbox" id="active"  name="active" />&nbsp;
	Name: <input type="text" id='name' value='' name='name' /> &nbsp; 
	<input type="submit" name="submit" id="submit" value="Submit" />
<?php echo form_close();?>
<?php endif;?>
</p>

<table class="data display datatable" id="example">
<thead>
	<th  >Id</th>
	<th >Tên</th> 
	<th  >Kích hoạt</th>
	<th  >Action</th>
</thead>
<tbody>
<?php 
			if($tyies != null){
	    		foreach($tyies as $type)
	    		{
	    			?>
	    			<tr class="odd gradeX">
					<td><?php echo $type->id ;?></td>
					<td><?php echo $type->name ;?></td> 
					<td>
					 <?php if($type->active == 1): ?>
		           		<img src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> 
		            <?php else:?>
		            	<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> 
		            <?php endif;?>
					</td>
					<td><a href="<?php echo site_url('cp/contype/0').'/'.$type->id;?>">Sửa</a> | <a href="<?php echo site_url('cp/deltype').'/'.$type->id;?>">Xóa</a> </td>
					</tr>
	    			<?php 
	    		}
			}
?>
</tbody>
</table>
<?php echo $page; ?>
