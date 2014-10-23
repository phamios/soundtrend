<?php echo $error;?>

<?php echo form_open_multipart('cp/adduser'); ?>
	<table>
		<tr>
			<td>Kích hoạt</td>
			<td><input type="checkbox" id="active"  name="active" /></td>
		</tr>
		<tr>
			<td>Tên</td>
			<td><input type="text" id='username' value='' name='username' /></td>
		</tr>
 		<tr>
			<td>Mật khẩu </td>
			<td><input type="text" id='password' value='' name='password' /></td>
		</tr>
		<tr>
			<td>Loại thành viên</td>
			<td>
				<select name="type" id="type">
					<option value="1">Administrator</option>
					<option value="2">Quản lý merchant </option>
					<option value="3">Thành viên Merchant</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="Submit" /> 
			<INPUT TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;"></td>
		</tr>
	</table>
<?php echo form_close();?>