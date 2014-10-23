 <p> 
<?php echo form_open_multipart('cp/add_merchantmember'); ?>
<table>
	<tr>
		<td>Tên đăng nhập: &nbsp; </td>
		<td><input type="text" value="" id="username" name="username" /></td>
	</tr>
	<tr>
		<td> Mật khẩu: </td>
		<td><input type="text" value="" id="password" name="password" /></td>
	</tr> 
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Thêm" /></td> 
	</tr>
</table>  
<?php echo form_close();?>
 </p>
 
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên</th>
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php foreach($members as $member):?>
		<tr class="odd gradeX">
			<td><?php echo $member->id ;?></td>
			<td><?php echo $member->username ;?></td>
			<td><?php if($member->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?></td>
			<td> <a href="<?php echo site_url('cp/delmembermerchant').'/'.$member->id;?>">Xóa</a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table> 
