<table class="data display datatable" id="example">
<thead>
		<th  >Ngày đến </th>
		<th >Ngày đi </th>
		<th  >Phòng </th>
		<th  >Tên </th>
        <th  > Số hộ chiếu </th>
        <th>Quốc tịch </th>
        <th>Action</th>
</thead>
 <tbody>
		<?php foreach($books as $book):?>
    	
		<tr class="odd gradeX">
		<td><?php echo $book->checkin ;?></td>
		<td><?php echo $book->checkout ;?></td>
                <td><?php echo $book->roomid ;?></td>
		<td><?php echo $book->fullname ;?></td>
                <td><?php echo $book->passport ;?></td>
                <td><?php echo $book->country ;?></td>
		<td><a href="<?php echo site_url('cp/bookdetail').'/'.$book->id;?>">Chi tiết </a> </td>
		</tr>
		<?php endforeach;?>
</tbody>
</table>