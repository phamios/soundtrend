 
<?php echo form_open_multipart('cp/add_merchant'); ?>
<table width="100%">
	<tr>
		<td><font color="red">(*)</font> Company name: </td>
		<td><input type="text" name="name"  size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Address: </td>
		<td><input type="text" name="address" size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Registration number:</td>
		<td><input type="text" name="regnumber" size="60" /></td>
	</tr>
	<tr>
		<td>Website :</td>
		<td><input type="text" name="website"  size="60"/></td>
	</tr>
	<tr>
		<td>Tel/Fax  :</td>
		<td><input type="text" name="tel"  size="60"/></td>
	</tr>
	<tr>
		<td>Category of products: </td>
		<td>
			<select name="catemerchant" id="catemerchant" >
			<?php foreach($childmenus as $cate):?> 
					<option value="<?php echo $cate->id;?>"><?php echo $cate->name;?></option> 
			<?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Sector:</td>
		<td><input type="text" name="sector"  size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Logo:</td>
		<td><input type="file" id="fileimage" value="" name="fileimage" size="60"/></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td><textarea name="des" id="des" cols=30 rows=6>  </textarea>
			<script>
				var oEdit1 = new InnovaEditor("oEdit1");
				oEdit1.width=678;
				oEdit1.height=200;
				oEdit1.cmdAssetManager = "modalDialogShow('<?php echo base_url()?>/editor/assetmanager.php',640,465)";
				oEdit1.btnPasteText=true;
				oEdit1.btnFlash=true;
				oEdit1.btnMedia=true;
				oEdit1.REPLACE("des");
				</script>
		</td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Contact person:</td>
		<td>
			 
			 <input type="text" name="namecontact"   size="60"/>
		</td>
	</tr>
	 <tr>
		<td><font color="red">(*)</font>Email :</td>
		<td><input type="text" name="emailcontact"   size="60"/></td>
	</tr>
	<tr>
		<td>Tel/MB  :</td>
		<td><input type="text" name="telcontact"  size="60"/></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
 
<input type="submit" name="submit" value="Cập nhật thông tin "/>
<?php echo form_close(); ?> 
 