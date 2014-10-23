<?php foreach ($uintros as $uintro): ?>
    <?php echo form_open_multipart('cp/updateintro/' . $id); ?>
    <table>
        <tr>
            <td>Ngôn ngữ: </td>
            <td>
                <select id="langid" name="langid">
                    <?php foreach ($languies as $lang): ?>
                        <option <?php if ($uintro->langid == $lang->id): ?>selected="selected"<?php endif; ?> value="<?php echo $lang->id; ?>"><?php echo $lang->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng </td>
            <td>
                <?php if ($uintro->active == 1): ?>
                    Active: <input type="checkbox" id="active"  name="active" checked="checked" />&nbsp;
                <?php else: ?>
                    Active: <input type="checkbox" id="active"  name="active" />&nbsp;
                <?php endif; ?>	
            </td>
        </tr>

        <tr>
            <td>Tiêu đề bài viết: </td>
            <td>
                <input type="text" id='name' value='<?php echo $uintro->title ?>' name='name' /> 
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea rows="20" cols="100" name="des" id="des"><?php echo $uintro->des ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Ảnh minh họa </td>
            <td>
                <input type="file" id="fileimage" name="fileimage" /> 
            </td>
        </tr>
        <tr>
            <td>Ảnh minh họa </td>
            <td>
                <img src="<?php echo base_url() . 'uploads/' . $uintro->images; ?>" alt="null" width="50px" height="50px"/>&nbsp; 
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" id="submit" value="Chấp nhận" /> <INPUT TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;">
            </td>
        </tr>
    </table>

    <?php echo form_close(); ?>
<?php endforeach; ?>