<table width="100%" bgColor='white'>
<tr>
	<td  >Id</td>
	<td >Tên Item</td> 
	<td  >Diễn giải</td>
	<!-- <td  >Ảnh</td> -->
	<td  >Kích hoạt</td>
	<td  >Action</td>
</tr>

<?php foreach($intros as $intro):?>
    <tr onMouseOver="this.bgColor='#FFF8DC'" onMouseOut="this.bgColor='#FFF'">
    <td><?php echo $intro->id ;?></td>
    <td><?php echo $intro->title ;?></td>
    <td><?php echo substr($intro->des,0,250) ;?></td>  
    <!-- <td><img src="<?php echo base_url().'uploads/'.$intro->image;?>" alt="null" width="50px" height="50px"/></td> -->
    <td><?php echo $intro->active ;?></td>
    <td><a href="<?php echo site_url('cp/updateintro').'/'.$intro->id;?>">Sửa</a> | <a href="<?php echo site_url('cp/delintro').'/'.$intro->id;?>">Xóa</a> </td>
    </tr>
     <?php endforeach;?>

</table>

