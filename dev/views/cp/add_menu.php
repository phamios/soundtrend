<?php echo form_open_multipart('cp/add_menu'); ?>
<table>
    <tr>
            <td>Kích hoạt</td>
            <td><input type="checkbox" id="active"  name="active" /></td>
    </tr>
    <tr>
            <td>Ngôn ngữ</td>
            <td><select id="langid" name="langid">
                    <?php foreach($languies as $lang):?>
                <option value="<?php echo $lang->id?>"><?php echo $lang->name;?></option>
                <?php endforeach;?>

                </select>
            </td>
    </tr>
    <tr>
            <td>Tên</td>
            <td><input type="text" id='menuname' value='' name='menuname' /></td>
    </tr>
    <tr>
            <td>Trỏ tới </td>
            <td><select id="menulink" name="menulink">
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    <option value="-1">Online Services</option>
                    <?php foreach($caties as $cate):?>
                    <option value="<?php echo $cate->id?>"><?php echo $cate->name;?></option>
                    <?php endforeach;?>
                    
                </select>
            </td>
    </tr>
    <tr>
            <td>Menu cha:</td>
            <td><select id="menuroot" name="menuroot">
                    <option value=""> &nbsp;&nbsp;&nbsp;</option>
                    <option value="-1">Online Services</option>
                    <?php foreach($menus as $menu):?>
                    <option value="<?php echo $menu->id?>"><?php echo $menu->menuname;?></option>
                    <?php endforeach;?>
                    
                </select>
            </td>
    </tr>
    <tr>
            <td>Link ( nếu sử dụng link ngoài )</td>
            <td><input type="text" id='menuurl' value='' name='menuurl' /></td>
    </tr>

    <tr>
            <td>Xếp thứ tự </td>
            <td>
                <select id="menuorder" name="menuorder">
                    <option value="1">1</option> 
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                    <option value="4">4</option> 
                    <option value="5">5</option> 
                    <option value="6">6</option> 
                    <option value="7">7</option> 
                </select>
            </td>
    </tr>
    <tr>
            <td></td>
            <td><input type="submit" name="submit" id="submit" value="Submit" /> <INPUT TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;"></td>
    </tr>
</table>
<?php echo form_close();?>
