<table class="data display datatable" id="example">
	<thead>
		<tr>
			<th>Id</th>
			<th>Tên banner</th>
			<th>Vị trí</th>
			<th>Link ( nếu có )</th>
			<th>Kích hoạt</th>
			<th>Action</th>
		</tr>
	</thead>
	 <tbody>
    <?php foreach ($banners as $banner): ?> 
   
		<tr class="odd gradeX">
			<td><?php echo $banner->id; ?></td>
			<td><?php echo $banner->banner; ?></td>
			<td><?php echo $banner->position; ?></td>
			<td><?php echo $banner->link; ?></td>
			<td><?php if($banner->active == 1): ?>
            	<img src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> 
            	<?php else:?>
            	<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> 
            	<?php endif;?></td>
           	<td><a href="<?php echo site_url('cp/delbanner') . '/' . $banner->id; ?>"><span></span>Xóa</a> </td>
		</tr> 
    <?php endforeach; ?> 
    </tbody>
</table>
