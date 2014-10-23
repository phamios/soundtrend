 
<?php if($usertype == 1):?>
 <p><script type="text/javascript"  >
			function changeitem(selectObj){  
				var id=selectObj.value;
				var dataString =  id;
		    		$.ajax({
		            url: "<?php echo base_url().'index.php/cp/ajaxmerchantcontent/';?>"+ dataString ,
		            type:'POST', 
		            data: dataString, 
		            success: function(output_string){ 
		                    $(".resultajax").html(output_string);
		                }  
		            });  
		 
				}
		</script>
		 
	 <select name="cateidmerch" class="cateidmerch" id="cateidmerch" onchange="changeitem(this);" >
	 	<?php foreach($showcates as $cate):?> 
	 	<option  value="<?php echo $cate->id;?>"><?php echo $cate->name;?></option>
	 	<?php endforeach;?>
	 </select>
</p>
 
<?php endif;?>
<?php echo $pages; ?>
<br />
<table class="data display datatable" id="example">
	<thead>
		<th>Id</th>
		<th>Tên Item</th>
		<th>Chuyên mục</th>
		<?php if($usertype == 1):?>
		<th>Merchant đăng</th>
		<?php endif;?>
		<!-- <td  >Ảnh</td> -->
		<th>Kích hoạt</th>
		<th>Action</th>
	</thead>
	
	<?php if($usertype == 1):?>
		<tbody class="resultajax"> 
		</tbody>
	<?php else:?>
	<tbody>
	<?php
	foreach($merchantcontents as $content)
	{
		?>
		<tr class="odd gradeX">
			<td><?php echo $content->id ;?></td>
			<td><?php echo $content->name ;?></td>
			<td><?php echo $content->catename ;?></td>
			<td><?php echo $content->userid ;?></td>
			<td><?php if($content->active == 1): ?> <img
				src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> <?php else:?>
			<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> <?php endif;?>
			</td>
			<td><a
				href="<?php echo site_url('cp/updatemerchantcontent').'/'.$content->id;?>">Sửa</a>
			| <a href="<?php echo site_url('cp/delmerchantcontent').'/'.$content->id;?>">Xóa</a>
			</td>
		</tr>
		<?php
	}
	?>
	<?php endif;?>
	</tbody>
</table>
	<?php echo $pages; ?>
