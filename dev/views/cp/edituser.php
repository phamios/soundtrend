<?php echo $error;?>
<?php foreach ($userdetails as $user):?>
<?php echo form_open_multipart('cp/edituser'); ?>
	<table>
		<tr>
			<td>Kích hoạt</td>
			<td><?php if($user->active == 1):?>
                Active: <input type="checkbox" id="active"  name="active" checked="checked" />&nbsp;
            <?php else:?>
                Active: <input type="checkbox" id="active"  name="active" />&nbsp;
            <?php endif;?>	</td>
		</tr>
		<tr>
			<td>Tên</td>
			<td><input type="text" id='username' value='<?php echo $user->username;?>' name='username' /></td>
		</tr>
 		<tr>
			<td>Mật khẩu </td>
			<td><input type="text" id='password' value='' name='password' /></td>
		</tr>
		<tr>
			<td>Loại thành viên</td>
			<td>
				<select name="type" id="type">
					
					<option  value="1" <?php if($user->type==1):?>selected <?php endif;?>>Administrator</option>
					<option value="2" <?php if($user->type==2):?>selected <?php endif;?>>Quản lý merchant </option>
					<option value="3" <?php if($user->type==3):?>selected <?php endif;?>>Thành viên Merchant</option>
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
<?php endforeach;?>