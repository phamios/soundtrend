
<?php echo form_open_multipart('cp/addintro'); ?>
	<table>
                <tr>
                    <td>Ngôn ngữ:</td>
                    <td><select id="langid" name="langid">
                            <?php foreach($languies as $lang):?>
                            <option value="<?php echo $lang->id;?>"><?php echo $lang->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
		</tr>
		<tr>
			<td>Kích hoạt</td>
			<td><input type="checkbox" id="active"  name="active" /></td>
		</tr>
		<tr>
			<td>Tên</td>
			<td><input type="text" id='name' value='' name='name' /></td>
		</tr>
		
            
		<tr>
			<td>Lời giới thiệu</td>
			<td><textarea rows="8" cols="25" name="des" id="des"></textarea></td>
		</tr>
		<tr>
			<td>Ảnh minh họa</td>
			<td><input type="file" id="fileimage" value="" name="fileimage" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
		</tr>
	</table>
<?php echo form_close();?>