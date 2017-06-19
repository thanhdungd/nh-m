<?php 
	include('dbconect.php');
	/* Thuật toán phân trang */
	$tin=mysql_query("select * from tourdulich"); 
	$row_per_page=6; //Số dòng trên 1 trang 
	//tính số dòng cần hiển thị 
	$rows=mysql_num_rows($tin); 
	//tính số trang cần để hiển thị 
	if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);  
	else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị 

	if(isset($_GET['start']) && (int)$_GET['start']) 
		 $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy 
	else $start=0; 

	$sql=mysql_query("Select * from tourdulich order by matour desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^) 


	
	
?>
<!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
<div><?php include"slide.php"; ?></div>
<div id="danhmuc"><p>Các tour mới nhất</p></div>
<table border="0" width=650 cellspacing="10" cellpadding="5">
<tr>
<?php
$d = 0;
$str = "Select * from tourdulich order by matour desc limit $start,$row_per_page";
//echo $str;
$result = mysql_query($str);
while($rows = mysql_fetch_array($result)){
$d = $d + 1;
?>
<td>
<table border="0">
<tr>
<td align="center" id="image" style="margin:5px;" >
<div  style="boder:1px solid black;">
<a href="?tour=<?php echo $rows['matour']; ?>"><img src="anhtourdulich/<?php echo $rows['anh']; ?>" alt="Profile Photo" width="165" title="<?php echo $rows['tentour']; ?>"  height="200" style="border:2px solid #f2f2f2"></a>
</div>
</td>
</tr>
<tr>

<td height=30 align="center" width="200px">
<font style="color:#32bae0;">
 
<a href="?tour=<?php echo $rows['matour']; ?>" style="text-decoration:none;">
<span style="align:center;text-decoration:none;">
<font color="blue"><b><?php echo $rows['tentour']; ?></b><br></font>
<font color="red" size="3"> <?php echo number_format($rows['giatien']).' '.'VND'; ?><br /></font>
<?php echo $rows['songay']; ?>
</span>
</a>
</font>
<br />
</td>
</tr>
</table>
</td> 
<?php
if($d%3 == 0)
echo "</tr>";
}
//var_dump($rows);
?>
</tr>
</table>
<div class="phantrang">
<?php 
//bắt đầu phân trang 
$page_cr=($start/$row_per_page)+1; 
//echo $page_cr."<br>"; 
echo '<div class="pagination">';
for($i=1;$i<=$page;$i++) 
{ 
 if ($page_cr!=$i) 
		//echo "<li><a href='check.php?start=".$row_per_page*($i-1)."'>$i&nbsp;</a></li>"; 
		echo '<a href="?start='.$row_per_page*($i-1).'" class="page gradient">'.$i.'</a>'; 
		//echo '<a href="check.php?start='.$i.'" class="page gradient">'.$i.'</a>'; 
		
 else  
		//echo $i." "; 
		echo '<a href="?start='.$row_per_page*($i-1).'" class="page active">'.$i.'</a>'; 
		/* echo '<a href="check.php?start='.$i.'" class="page active">'.$i.'</a>';  */
		

}

echo '</div>'; 
?>
</div>
	

