<script language=javascript type='text/javascript'> 
    function hideDiv() { 
        if (document.getElementById) { 
            document.getElementById('postid').style.visibility = 'hidden'; 
            document.getElementById('div2').style.visibility = 'hidden'; 
        } 
    } 
    function showDiv() { 
        if (document.getElementById) { 
            document.getElementById('postid').style.visibility = 'visible'; 
            document.getElementById('div2').style.visibility = 'hidden'; 
        } 
    } 
</script> 

<?php echo form_open_multipart('cp/add_images'); ?>
<!--<input checked type="radio" name="typeimage" value="Room" onclick="javascript:hideDiv()" /> Ảnh phòng &nbsp;&nbsp;-->
<input type="radio" name="typeimage" value="Bài viết" onclick="javascript:showDiv()"/> Ảnh bài viết.

<table>
    <tr>
        <td>Bài liên quan</td>
        <td>

            <select id="postid" name ="postid" style="visibility: hidden">
                <?php foreach ($contents as $content): ?>
                <option value="<?php echo $content->id; ?>"><?php echo $content->name; ?></option>
                <?php endforeach; ?>
            </select>

          
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
<?php echo form_close(); ?>
<br/>
<table class="data display datatable" id="example">
    <thead>
        <th >Id</th>
        <th >Tên</th> 
        <th >Mã bài đăng</th> 
        <th >Loại bài đăng</th> 
        <th  >Action</th>
    </thead>
	<tbody>
	    <?php foreach ($imagies as $image): ?> 
        <tr class="odd gradeX">
            <td><?php echo $image->id; ?></td>
            <td><?php echo $image->imagename; ?></td>
            <td><?php echo $image->postid; ?></td> 
            <td><?php echo $image->type; ?></td> 
            <td><a href="<?php echo site_url('cp/delimages') . '/' . $image->id; ?>">Xóa</a> </td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
    
</table>