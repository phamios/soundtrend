<?php echo form_open_multipart('cp/roleinfo'); ?>
	<table width="100%">
		<tr>
			<td>Quản trị viên: </td>
			<td>
				<select name="username" id="username">
					<?php foreach($users as $user):?>
					<option value="<?php echo $user->id;?>"><?php echo $user->username; ?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tên Quyền :  </td>
			<td>
				<select MULTIPLE name="roletype[]" style="width:350px; id="roletype"> 
					<option value="1">Thêm </option> 
					<option value="2">Sửa  </option> 
					<option value="3">Xóa </option> 
					<option value="4">Xem </option>  
					
				</select> 
			</td>
		</tr>
		<tr>
			<td>Chuyên mục: </td>
			<td>
				<select name="module" id="module" style="width:350px;"> 
					<option value="contype">Loại danh mục </option> 
					<option value="cate">Danh mục </option> 
					<option value="content">Bài viết </option> 
					<option value="intro">Nội dung giới thiệu </option> 
					<option value="member">Quản lý member </option> 
					<option value="user">Quản lý quản trị viên </option>
					<option value="role">Phân quyền </option>
					<option value="roleinfo">Loại cấp bậc quản trị </option>
					<option value="menu">Quản lý menu </option>
					<option value="listimage">Quản lý ảnh </option>
					<option value="banner">Quản lý banner </option>
					<option value="roomtype">Quản lý dịch vụ </option>
					<option value="lang">Quản lý ngôn ngữ </option>
<!--					<option value="room">Phòng </option>-->
<!--					<option value="booking">Đặt phòng </option>-->
					<option value="5">Quản lý liên hệ </option>
					<option value="5">Cấu hình </option>
					<option value="5">SEO</option>  
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
		</tr>
	</table>
<?php echo form_close();?>
