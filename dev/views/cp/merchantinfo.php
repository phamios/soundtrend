<?php foreach($merchantinfos as $info):?>
<table class="data display datatable" id="example">
	<tbody>
		<tr class="odd gradeX">
			<td>ID</td>
			<td><?php echo $info->id ;?></td>
		</tr>
		<tr>
			<td>Tên merchant</td>
			<td><input type="text" id="merchantname" name="merchantname"
				value="<?php echo $info->name ;?>" /></td>
		</tr>
		<tr>
			<td>Thuộc danh mục:</td>
			<td><?php echo $info->catemerchantid ;?> - <?php echo $info->catenamemerchant ;?></td>
		</tr>
		<tr>
			<td>Địa điểm</td>
			<td><input type="text" id="merchantlocation" name="merchantlocation"
				value="<?php echo $info->location ;?>" /></td>
		</tr>
		<tr>
			<td>Điện thoại:</td>
			<td><input type="text" id="merchanttel" name="merchanttel"
				value="<?php echo $info->tel ;?>" /></td>
		</tr>
		<tr>
			<td>Fax</td>
			<td><input type="text" id="merchantfax" name="merchantfax"
				value="<?php echo $info->fax ;?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="text" id="merchantemail" name="merchantemail"
				value="<?php echo $info->email ;?>" /></td>
		</tr>
		<tr>
			<td>Website</td>
			<td><input type="text" id="merchantweb" name="merchantweb"
				value="<?php echo $info->web ;?>" /></td>
		</tr>
		<tr>
			<td>Contact 1</td>
			<td><input type="text" id="merchantcontact1" name="merchantcontact1"
				value="<?php echo $info->contact1 ;?>" /></td>
		</tr>
		<tr>
			<td>Contact 2</td>
			<td><input type="text" id="merchantcontact2" name="merchantcontact2"
				value="<?php echo $info->contact2 ;?>" /></td>
		</tr>
		<tr>
			<td>Hint</td>
			<td><input type="text" id="merchanthint" name="merchanthint"
				value="<?php echo $info->hint ;?>" /></td>
		</tr>
		<tr>
			<td>Logo</td>
			<td><input type="text" id="merchantlogo" name="merchantlogo"
				value="<?php echo $info->logo ;?>" /> <input type="file"
				name="merchantlogo" /></td>
		</tr>
		<tr>
			<td>Banner</td>
			<td><input type="text" id="merchantbanner" name="merchantbanner"
				value="<?php echo $info->banner ;?>" /> <input type="file"
				name="merchantbanner" /></td>
		</tr>
		 
		<tr>
			<td> </td>
			<td><input type="submit" name="submit" value="Cập nhật"></td>
		</tr>
	</tbody>
</table>
<?php endforeach;?>