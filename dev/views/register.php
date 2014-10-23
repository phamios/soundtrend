 <div class="midtxt">
<?php if($notification <> null): ?>
<div class="left_box">
	<font color="red"><?php echo $notification;?></font>
</div>
<?php endif;?>
<div>
<?php echo form_open_multipart('home/register'); ?>
<table width="414">
	<tr>
		<td><font color="red">(*)</font> Company name: </td>
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Address: </td>
		<td><input type="text" name="address" /></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Registration number:</td>
		<td><input type="text" name="regnumber" /></td>
	</tr>
	<tr>
		<td>Website :</td>
		<td><input type="text" name="website" /></td>
	</tr>
	<tr>
		<td>Tel/Fax  :</td>
		<td><input type="text" name="tel" /></td>
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
		<td><input type="text" name="sector" /></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Logo:</td>
		<td><input type="file" id="fileimage" value="" name="fileimage" /></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td><textarea name="des" id="des" cols=30 rows=6></textarea></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Contact person:</td>
		<td><input type="text" name="namecontact" /></td>
	</tr>
	<tr>
		<td><font color="red">(*)</font>Email :</td>
		<td><input type="text" name="emailcontact" /></td>
	</tr>
	<tr>
		<td>Tel/MB  :</td>
		<td><input type="text" name="telcontact" /></td>
	</tr>
	 
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
<?php echo $captcha;?>
<input type="submit" name="submit" value="Submit"/>
<?php echo form_close(); ?>
</div>
</div>