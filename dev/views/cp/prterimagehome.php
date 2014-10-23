<font color='red'><?php echo $error;?></font> <br/><br/>
<?php echo form_open_multipart('cp/prterimagehome'); ?>
<table>
	 
	<tr>
		<td>Ảnh </td>
		<td><input type="file" id="fileimage" value="" name="fileimage" /></td>
	</tr>

	<tr>
		<td></td>
		<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
	</tr>
</table>

<br />
<br />
<br />
			<?php echo $page; ?>
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Ảnh</th>
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php foreach($images as $image):?>
		<tr class="odd gradeX">
			<td><?php echo $image->id ;?></td>
			<td><?php echo $image->images ;?></td>
			<td><?php if($image->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?></td>
			<td><a href="<?php echo site_url('cp/uaib').'/'.$image->id;?>">UnActive</a>
			| <a href="<?php echo site_url('cp/delib').'/'.$image->id;?>">Xóa</a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
		<?php echo $page; ?>
