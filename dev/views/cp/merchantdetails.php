 
<?php foreach($merchantinfos as $info):?> 
<?php echo form_open_multipart('cp/merchantuserdetails/'.$info->id); ?>
<table width="100%">
	<tr>
		<td><font color="red">(*)</font> Company name: </td>
		<td><input type="text" name="name" value="<?php echo $info->name?>" size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Address: </td>
		<td><input type="text" name="address" value="<?php echo $info->location?>" size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Registration number:</td>
		<td><input type="text" name="regnumber" value="<?php echo $info->registernumber?>"size="60" /></td>
	</tr>
	<tr>
		<td>Website :</td>
		<td><input type="text" name="website" value="<?php echo $info->web?>" size="60"/></td>
	</tr>
	<tr>
		<td>Tel/Fax  :</td>
		<td><input type="text" name="tel"  value="<?php echo $info->tel?>" size="60"/></td>
	</tr>
	<tr>
		<td>Category of products: </td>
		<td>
			<select name="catemerchant" id="catemerchant" >
			<?php foreach($childmenus as $cate):?>
				<?php if($info->catemerchantid == $cate->id):?>
					<option selected value="<?php echo $cate->id;?>"><?php echo $cate->name;?></option>
				<?php else:?>
					<option value="<?php echo $cate->id;?>"><?php echo $cate->name;?></option>
				<?php endif;?>
			<?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Sector:</td>
		<td><input type="text" name="sector" value="<?php echo $info->hint?>" size="60"/></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Logo:</td>
		<td><input type="file" id="fileimage" value="" name="fileimage" size="60"/></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td><textarea name="des" id="des" cols=30 rows=6> <?php echo $info->des?></textarea>
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
			<?php $contact = explode("--",$info->contact1);?>
			 <input type="text" name="namecontact" value="<?php echo $contact[0];?>" size="60"/>
		</td>
	</tr>
	 <tr>
		<td><font color="red">(*)</font>Email :</td>
		<td><input type="text" name="emailcontact" value="<?php echo $contact[1];?>" size="60"/></td>
	</tr>
	<tr>
		<td>Tel/MB  :</td>
		<td><input type="text" name="telcontact" value="<?php echo $contact[2];?>" size="60"/></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
 
<input type="submit" name="submit" value="Cập nhật thông tin "/>
<?php echo form_close(); ?>
<?php endforeach;?>
 