<!--Cấu hình banner: <br/>
<?php echo form_open_multipart('cp/cateinsert'); ?>
	Active: <input type="checkbox" id="active"  name="active" />&nbsp;
	Image: <input type="file" id="bannerimage" value="" name="bannerimage" />&nbsp;
	Vị trí: <select id="position" name="position">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select>
	Link: <input type="text" id="link" name="link" />
	<input type="submit" name="submit" id="submit" value="Submit" />
<?php echo form_close();?>
<br/><br/>
Cấu hình quảng cáo:<br/> 
<br/><br/>
-->
<?php echo $notify;?>
<?php foreach($configs as $config):?>
<?php echo form_open_multipart('cp/config'); ?>
	<table>
		<tr>
			<td>Site name: </td>
			<td>&nbsp;&nbsp;<input type="text" value="<?php echo $config->sitename;?>" name="sitename" id="sitename" /></td>
		</tr>
		<tr>
			<td>Số tin bài hot: </td>
			<td>&nbsp;&nbsp;<input type="text" value="<?php echo $config->hotnewcount;?>" name="hotnewcount" id="hotnewcount" /></td>
		</tr>
		<tr>
			<td>Số tin bài merchant: </td>
			<td>&nbsp;&nbsp;<input type="text" value="<?php echo $config->artcilemerchantcount;?>" name="artcilemerchantcount" id="artcilemerchantcount" /></td>
		</tr>
		<tr>
			<td>Số thành viên mới:</td>
			<td>&nbsp;&nbsp;<input type="text" value="<?php echo $config->newmerchantcount;?>" name="newmerchantcount" id="newmerchantcount" /></td>
		</tr>
		<tr>
			<td>Số comment mới nhất: </td>
			<td>&nbsp;&nbsp;<input type="text" value="<?php echo $config->commentmerchantcount;?>" name="commentmerchantcount" id="commentmerchantcount" /></td>
		</tr>
		<tr>
			<td>Cấu hình thẻ meta: </td>
			<td>&nbsp;&nbsp;<input size=50 type="text" value="<?php echo $config->meta;?>" name="meta" id="meta" /></td>
		</tr>
		<tr>
			<td>Cấu hình thẻ Description: </td>
			<td>&nbsp;&nbsp;<input size=50 type="text" value="<?php echo $config->des;?>" name="des" id="des" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="Cập nhật"></td>
		</tr>
	</table>
<?php echo form_close();?>
<?php endforeach;?>