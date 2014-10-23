<?php foreach($contenties as $cont):?>
<?php echo form_open_multipart('cp/contentupdate/'.$id); ?>

<table width="100%">
     <tr>
         <td>Ngôn ngữ: </td>
         <td>
             <select id="langid" name="langid">
                <?php foreach($languies as $lang):?>
                 <option <?php if($cont->lang == $lang->id):?>selected="selected"<?php endif;?> value="<?php echo $lang->id;?>"><?php echo $lang->name;?></option>
                <?php endforeach;?>
            </select>
         </td>
     </tr>
     <tr>
         <td>Tình trạng </td>
         <td>
            <?php if($cont->active == 1):?>
                Active: <input type="checkbox" id="active"  name="active" checked="checked" />&nbsp;
            <?php else:?>
                Active: <input type="checkbox" id="active"  name="active" />&nbsp;
            <?php endif;?>	
         </td>
     </tr>
     <tr>
            <td>Danh mục</td>
            <td><select id="cate" name="cate">
                    <?php foreach($caties as $cate):?>
                    <option value="<?php echo $cate->id?>" <?php if($cont->cateid == $cate->id):?> selected <?php endif; ?>><?php echo $cate->name;?></option>
                    <?php endforeach;?>
                </select>
            </td>
    </tr>
     <tr>
         <td>Tiêu đề bài viết: </td>
         <td>
             <input type="text" id='name' value='<?php echo $cont->name?>' name='name' /> 
         </td>
     </tr>
     <tr>
         <td>Nội dung</td>
         <td>
              <textarea rows="20" cols="100" name="des" id="des"><?php echo $cont->des?></textarea>
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
         <td>Ảnh minh họa </td>
         <td>
             <input type="file" id="fileimage" name="fileimage" /> 
         </td>
     </tr>
     <tr>
        <td>Ảnh minh họa </td>
        <td>
            <img src="<?php echo base_url().'uploads/'.$cont->image;?>" alt="null" width="50px" height="50px"/>&nbsp; 
        </td>
     </tr>
     <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" id="submit" value="Chấp nhận" /> <INPUT TYPE="button" VALUE="Hủy" onClick="history.go(-1);return true;">
        </td>
     </tr>
    
 </table>
<?php echo form_close();?>
<?php endforeach;?>