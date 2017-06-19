<?php require_once('function.php'); 

?>
<form action="" method="post">
<table cellspacing="3" cellpadding="15"  border=0>
<tr><td colspan=3 style=color:blue><h2>THỐNG KÊ</h2></td></tr>
<tr><td>Thời gian</td><td>
<select name="thang">
<option value="0">Chọn tháng</option>
<?php
if(isset($_POST['ok']))
	{
		$bmonth=$_POST['thang'];
	}else{ $bmonth="";}	
mangmonth($bmonth);
?>
</select>
</td><td>
<select name="nam">
<option value="0"> Chọn năm</option>
<?php
if(isset($_POST['ok']))
	{
		$year=$_POST['nam'];
	}else{ $year="";}	
mangyear_thongke($year);
?>
</select>
<td><input type="submit" value="Thống kê" name="ok"></td></tr>
<tr><td colspan=3></td></tr>
</table>
</form>
<?php
if(isset($_POST['ok']))
{
	$thang=$_POST['thang'];
	$nam=$_POST['nam'];
	if(($nam!=0) && ($thang==0))
	{
		ListThongKe_NAM($nam);
		
	}
	if(($thang!=0) && ($nam==0))
	{
		echo '<script>alert("Vui lòng chọn Năm hoặc Tháng Năm");</script>';
		
	}
	if(($thang!=0) && ($nam!=0))
	{
		ListThongKe_THANGNAM($nam,$thang);
		
	}
	
	
}

?>
