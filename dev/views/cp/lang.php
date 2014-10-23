<?php echo form_open_multipart('cp/add_lang'); ?>
	<table width="100%">

		<tr>
			<td>Thêm ngôn ngữ mới: </td>
			<td><input type="text" id='langname' value='' name='langname' /></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
		</tr>
	</table>
<?php echo form_close();?>
<br/>
<table class="data display datatable" id="example">
<thead>
    <th >Id</th>
    <th >Tên</th>
    <th  >Action</th>
</thead>
<tbody>
    <?php foreach($languies as $lang):?>
    <tr class="odd gradeX">
    <td><?php echo $lang->id ;?></td>
    <td><?php echo $lang->name ;?></td>
    <td><a href="<?php echo site_url('cp/dellang').'/'.$lang->id;?>">Xóa</a> </td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>