 <?php if($usertype == 2 or $usertype==3):?>
<?php echo $pages; ?>
<br />
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên Merchant</th>
		<th>Chuyên mục</th>
		<th>Diễn giải</th>
		<!-- <td  >Ảnh</td> -->
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php
	foreach($merchantcontents as $content)
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
			<td><a href="<?php echo site_url('cp/updatemerchantcontent').'/'.$content->id;?>">Sửa</a>
			| <a href="<?php echo site_url('cp/delmerchantcontent').'/'.$content->id;?>">Xóa</a>
			</td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table> 
<?php elseif($usertype==1):?>
 
<?php echo $pages; ?>
<br />
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên Merchant</th>  
		<!-- <td  >Ảnh</td> -->
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php
	foreach($merchantcontents as $content)
	{
		?>
		<tr class="odd gradeX">
			<td><a href="<?php echo site_url('cp/merchantuserdetails').'/'.$content->id?>"><?php echo $content->id ;?></a></td>
			<td><a href="<?php echo site_url('cp/merchantuserdetails').'/'.$content->id?>"><?php echo $content->username ;?></a></td>   
			<td><?php if($content->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?>
			</td>
			<td>
				
				<?php if($content->active == 1): ?> 
				<a href="<?php echo site_url('cp/disablemerchant').'/'.$content->id;?>">Dừng </a>
				<?php else:?>
				<a href="<?php echo site_url('cp/activemerchant').'/'.$content->id;?>">Kích hoạt </a>
				<?php endif;?> 
				|<a href="<?php echo site_url('cp/delmerchant').'/'.$content->id;?>">Xóa</a>
			</td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table> 

<?php endif;?>
