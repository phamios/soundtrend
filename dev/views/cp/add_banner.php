<?php echo form_open_multipart('cp/add_banner'); ?>
<table>
    <tr>
        <td>Kích hoạt</td>
        <td><input type="checkbox" id="active"  name="active" /></td>
    </tr>
    <tr>
        <td>Chọn vị trí hiển thị </td>
        <td>
            <select id="position" name="position" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Chọn ảnh banner</td>
        <td><input type="file" id="fileimage" value="" name="fileimage" /></td>
    </tr>
    <tr>
        <td>Link (trường hợp không muốn upload ảnh )</td>
        <td><input type="text" name="bannerlink" id="bannerlink" value="" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" id="submit" value="Submit" /> <INPUT TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;"></td>
    </tr>
</table>
<?php echo form_close(); ?>