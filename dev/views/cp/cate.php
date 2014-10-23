
<?php echo $page; ?>
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên</th>
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php foreach($caties as $cate):?>
		<tr class="odd gradeX">
			<td><?php echo $cate->id ;?></td>
			<td><?php echo $cate->name ;?></td>
			<td><?php if($cate->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?></td>
			<td><a href="<?php echo site_url('cp/editcate').'/'.$cate->id;?>">Sửa</a>
			| <a href="<?php echo site_url('cp/delcate').'/'.$cate->id;?>">Xóa</a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
		<?php echo $page; ?>
