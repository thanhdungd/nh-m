<?php
if(isset($_GET['id'])){
		$id=$_REQUEST['id'];
		function getDatTour($id){
		$query= "SELECT * FROM dattour a, tourdulich b  WHERE id='$id' and a.matour=b.matour ";
		//echo $query;
		$result=mysql_query($query);
		$row	= mysql_fetch_array($result);
		return $row;
		}
	
	$Tour=getDatTour($id);
	

?>


	

	
	

	
	<table align=center border="0" width=530px style=color:blue>
	<tr>
		<td>Tên tour:</td><td><?php echo $Tour['tentour']; ?></td>
	</tr>
	<tr>
		<td>Họ tên:</td><td><?php echo $Tour['hoten']; ?></td>
	</tr>
	<tr>
		<td>Tổng tiền thanh toán :</td><td><?php echo number_format($Tour['tien']).'VNĐ'; ?></td>
	</tr>
	<tr>
		<td>Số điện thoại:</td><td><?php echo $Tour['sdt']; ?></td>
	</tr>
	<tr>
		<td>Số người:</td><td><?php echo $Tour['songuoi']; ?></td>
	</tr>
	<tr>
		<td>Thời gian đặt tour:</td><td><?php echo $Tour['thoigian']; ?></td>
	</tr>
	<tr>
		<td>Thời gian đi:</td><td><?php echo $Tour['ngaydi'].'-'.$Tour['thangdi'].'-'.$Tour['namdi']; ?></td>
	</tr>
	<tr>
		<td>Điểm đón:</td><td><?php echo $Tour['diemdon']; ?></td>
	</tr>
	<tr>
		<td>Hình thức thanh toán:</td><td><?php echo $Tour['thanhtoan']; ?></td>
	</tr>
	
	</table>
<?php
}else{
echo "Không có dữ liệu";
}
?>