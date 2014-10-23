
<?php echo $pages; ?>
<br />
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên Item</th>
		<th>Chuyên mục</th>
		<th>Diễn giải</th>
		<!-- <td  >Ảnh</td> -->
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php
	foreach($contents as $content)
	{
		?>
		<tr class="odd gradeX">
			<td><?php echo $content->id ;?></td>
			<td><?php echo $content->name ;?></td>
			<td><?php echo $content->catename ;?></td>
			<td><?php echo substr($content->des,0,120) ;?></td>
			<!-- <td><img src="<?php echo base_url().'uploads/'.$content->image;?>" alt="null" width="50px" height="50px"/></td> -->
			<td><?php if($content->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?>
			</td>
			<td><a
				href="<?php echo site_url('cp/contentupdate').'/'.$content->id;?>">Sửa</a>
			| <a href="<?php echo site_url('cp/delcontent').'/'.$content->id;?>">Xóa</a>
			</td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
	<?php echo $pages; ?>
