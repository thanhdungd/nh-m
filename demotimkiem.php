<?php
	include('dbconect.php');
?>







<table border="0" width=650 cellspacing="10" cellpadding="5">
<tr>
<?php


if(isset($_POST['timkiem'])){
	$a=$_POST['tim'];
	if($a==1){
		
	$d = 0;
	
	$str="select * from tourdulich where giatien BETWEEN 0 AND 1000000";
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
}else if($a==2){

	
	$d = 0;
	
	$str="select * from tourdulich where giatien BETWEEN 1000000 AND 2000000";
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
}else{
$d = 0;
	
	$str="select * from tourdulich where giatien >2000000";
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
}
}
?>
</tr>
</table>


