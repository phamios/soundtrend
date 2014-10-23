<?php echo $pages;?>
<br />
<table class="data display datatable" id="example">
	<thead>
		<tr>
			<th width="40px">ID</th>
			<th><a href="#">User Nam</a></th> 
			<th><a href="#">Loại user </a></th> 
			<th><a href="#">Root </a></th>
			<th><a href="#">Active</a></th>
			<th><a href="#">Action</a></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($users as $user):?>
		<tr class="odd gradeX">
			<td><?php echo $user->id?></td>
			<td><?php echo $user->username?></td>  
			<td>
			<?php if($user->type == 1):?>
				Adminítrator 
				<?php elseif($user->type == 2):?>
					Quản trị viên Merchant 
				<?php elseif ($user->type == 3):?>
					Merchant user 
				<?php else:?>
					None 	
			<?php endif;?>
			</td>
			<td>
				<?php echo $user->root;?>
			</td>
			<td><?php if($user->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?></td>
			<td><a href="<?php echo site_url('cp/edituser').'/'.$user->id?>">Sửa </a> | <a href="<?php echo site_url('cp/deleteuser').'/'.$user->id?>">Xóa </a></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
