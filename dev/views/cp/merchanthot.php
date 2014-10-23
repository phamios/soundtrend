<!--<select name="merchantidcontent">
	<?php foreach($contentid as $content):?>
		<option value="<?php echo $content->id?>" ><?php echo $content->name;?> </option>
	<?php endforeach;?>
	</select>-->
	
	
<?php if($sesmerchantid == null):?>
<?php else:?> 
<?php foreach($sesmerchantid as $id):?>
 	<?php echo $id;?>
 <?php endforeach;?>
 <br/>
<?php endif;?>
<?php echo $error; ?>
 
<?php echo form_open_multipart('cp/merchanthot'); ?>
	
		<script type="text/javascript"  >
			function changeitem(selectObj){  
				var id=selectObj.value;
				var dataString =  id;
		    		$.ajax({
		            url: "<?php echo base_url().'index.php/cp/ajaxcate/';?>"+ dataString ,
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
	 <span class="resultajax"> 
	 </span>
	<select name="order">
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
	</select>
	<input type="submit" name="setselect" value="Thiết lập nhanh"/>
<?php echo form_close(); ?>
<br />
<?php echo form_open_multipart('cp/merchanthot'); ?> 
<table class="data display datatable" id="example">
	<thead> 
		<th>Id</th>
		<th>ID Content</th>
		<th>Chuyên mục</th>
		<th>Tên bài viết </th> 
		<th>Thứ tự</th> 
	</thead>
	<tbody>
	<?php
	foreach($showhots as $content)
	{
		?>
		<tr class="odd gradeX">
			 
			<td><?php echo $content->id ;?></td>
			<td><?php echo $content->merchantcontentid ;?></td>
			<td><?php echo $content->catemerchantname ;?></td>
			<td><?php echo $content->contentname ;?></td>
			<td><?php echo $content->order ;?></td>
			<td> <a href="<?php echo site_url('cp/delmerchanthot').'/'.$content->id;?>">Xóa</a>
			</td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
<?php echo form_close(); ?>
