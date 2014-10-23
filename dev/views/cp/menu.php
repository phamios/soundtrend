<table class="data display datatable" id="example">
    <thead>
        <th >Id</th>
        <th >Tên menu </th> 
        <th >Trỏ tới </th> 
        <th >Link ( nếu có )</th> 
        <th>Kích hoạt </th>
        <th > Thứ tự </th>
        <th >Action</td>
    </thead>
	<tbody>
    <?php foreach ($menus as $menu): ?> 
       <tr class="odd gradeX">
            <td><?php echo $menu->id; ?></td>
            <td><?php echo $menu->menuname; ?></td>
            <td><a href="<?php echo base_url().'index.php/h/cate/'.$menu->menulink; ?>" ><?php echo $menu->menulink; ?></a></td> 
            <td><?php echo $menu->menuurl; ?></td> 
            <td>
            <?php if($menu->active == 1): ?>
           		<img src="<?php echo base_url('').'/images/activeIcon.gif' ?>" /> 
            <?php else:?>
            	<img src="<?php echo base_url('').'/images/deactiveIcon.gif' ?>" /> 
            <?php endif;?>
            </td> 
            <td><?php echo $menu->order; ?></td> 
            <td><a href="<?php echo site_url('cp/delmenu') . '/' . $menu->id; ?>">Xóa</a> </td>
        </tr>
    <?php endforeach; ?> 
    </tbody>
</table>