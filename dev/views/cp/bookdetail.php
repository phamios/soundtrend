<p> <a href="<?php  echo site_url('cp/booking');?>"><b> Quay lại</b></a><br/></p>

<?php foreach($books as $book):?>
<table width="684" cellpadding="5px">
<tr >
	<td  >Ngày đến </td>
	<td ><?php echo $book->checkin ;?></td>
</tr>
<tr>
    <td>Ngày đi </td>
    <td><?php echo $book->checkout ;?></td>
</tr>
<tr>
    <td>Số chuyến bay </td>
    <td><?php echo $book->numberofly ;?></td>
</tr>
<tr>
    <td>Số người lớn </td>
    <td><?php echo $book->adult;?></td>
</tr>
<tr>
    <td>Số trẻ nhỏ </td>
    <td><?php echo $book->children;?></td>
</tr>
<tr>
    <td>Số phòng </td>
    <td><?php echo $book->numofroom ;?></td>
</tr>
<tr>
    <td>Loại phòng </td>
    <td><?php echo $roomname ;?></td>
</tr>
<tr>
    <td>Tên đầy đủ </td>
    <td><?php echo $book->fullname ;?></td>
</tr>
<tr>
    <td>Địa chỉ </td>
    <td><?php echo $book->address;?></td>
</tr>
<tr>
    <td>Điện thoại </td>
    <td><?php echo $book->phone;?></td>
</tr>
<tr>
    <td>Email </td>
    <td><?php echo $book->email;?></td>
</tr>
<tr>
    <td>Quốc tịch </td>
    <td><?php echo $book->country;?></td>
</tr>
<tr>
    <td>Số hộ chiếu </td>
    <td><?php echo $book->passport;?></td>
</tr>

		
</table>
<?php endforeach;?>
