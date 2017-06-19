<?php
if(isset($_GET['id'])){
		$id=$_REQUEST['id'];
		$query  = "DELETE FROM dattour WHERE id='$id'";
		$result = mysql_query($query)or die(" :".mysql_error());
		//echo $query;
		//return $result;
		echo "<script>alert('Đã xóa tour');window.location='index.php?top=36';</script>";		

}else{
echo 'Không có dữ liệu';
}
?>