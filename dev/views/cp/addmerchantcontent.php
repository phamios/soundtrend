
<?php echo form_open_multipart('cp/addmerchantcontent'); ?>
<table>
	<?php if($allactmerchants <> null): ?>
	<tr>
		<td>Merchant:</td>
		<td>
			<select name="usermerchantid" id="usermerchantid">
			<option value="0" selected > &nbsp; &nbsp; &nbsp; &nbsp;</option>
			<?php foreach ($allactmerchants as $merct) :?>
				<option value="<?php echo $merct->userid;?>"> <?php echo $merct->name?>  - <?php echo $merct->catenamemerchant?></option>
			<?php endforeach;?>
			</select>
		</td>
	</tr>
	<?php endif;?>
	<tr>
		<td>Ngôn ngữ:</td>
		<td><select id="langid" name="langid">
		<?php foreach($languies as $lang):?>
			<option value="<?php echo $lang->id;?>"><?php echo $lang->name;?></option>
			<?php endforeach;?>
		</select></td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td><input type="checkbox" id="active" name="active" /></td>
	</tr>
	<tr>
		<td>Tên</td>
		<td><input type="text" id='name' value='' name='name' /></td>
	</tr>
	<tr>
		<td>Danh mục</td>
		<td><select id="cate" name="cate">
		<?php foreach($caties as $cate):?>
			<option value="<?php echo $cate->id?>"><?php echo $cate->name;?></option>
			<?php endforeach;?>
		</select></td>
	</tr>
 
	<tr>
		<td>Lời giới thiệu</td>
		<td><textarea rows="20" cols="200" name="des" id="des"></textarea>
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
		<td>Ảnh minh họa</td>
		<td><input type="file" id="fileimage" value="" name="fileimage" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
	</tr>
</table>
			<?php echo form_close();?>