<?php echo form_open_multipart('cp/merchantcateadd'); ?>
<table> 
	<tr>
		<td>Kích hoạt</td>
		<td><input type="checkbox" id="active" name="active" /></td>
	</tr>
	<tr>
		<td>Tên</td>
		<td><input type="text" id='name' value='' name='name' /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" id="submit" value="Submit" /> <INPUT
			TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;"></td>
	</tr>
</table>
			<?php echo form_close();?>