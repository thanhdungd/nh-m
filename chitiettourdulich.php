<link rel="stylesheet" type="text/css" href="css/style.css" />
<?php
	if(isset($_GET['tour']))
	{
		$t=$_GET['tour'];
		require_once('dbconect.php');
		$sql="select * from tourdulich where matour='$t'";
		$result=mysql_query($sql);
		$rows=@mysql_fetch_array($result);
	}
?>
<table width="600" border="0">
  <tr>
    <td colspan="2"><font size="5" color="#0033FF"><?php echo $rows['tentour'];?></font></td>
  </tr>
  <tr>
    <td colspan="2"><img src="anh/chuan.jpg"></td>
  </tr>
  <tr>
    <td width="300" rowspan="6"><img src="anhtourdulich/<?php echo $rows['anh'];?>" width="300" height="240"></td>
    <!--<td width="300" height="29"><span class="chu">Tên tour:</span> <?php echo $rows['tentour'];?></td>--> 
  </tr>
   <tr>
    <td height="28" align="center"><span class="chu">Giá:</span></td>
  </tr>
  <tr>
	<td height="12" align="center"><font size="6" color="red"><?php echo number_format($rows['giatien']);?>VND</font</td>
  </tr>
  <tr>
    <td height="31"><span class="chu">Số ngày:</span> <font color="red" size="3"><?php echo $rows['songay'];?></font></td>
  </tr>
 
  <tr>
    <td height="29"><span class="chu">Mã tour</span> <font color="red" size="3"><?php echo $rows['matour'];?></font><font size="3" color="red">
	
	
  </tr>
   <?php 
  	if("$rows[maks]"!=0)
	{
 	?>
  <tr>
    <td height="26"<span class="chu">Khách Sạn:</span> <font size="3" color="red"><?php
			require_once('dbconect.php');
			$sql1="select * from khachsan where maks= '$rows[maks]'";
			$result1=mysql_query($sql1);
			$row=mysql_fetch_array($result1);
			echo $row['tenks'];
		?></font></td>
  <?php
	}
	?>
  <tr>
    <td height="25" align="left" background="anh/danhmuc.gif" colspan="2" class="chu"><b>Hành Trình</b></td>
	
  </tr>
  <tr>
    <td height="7" colspan="2" align="justify"><?php echo $rows['hanhtrinh'];?></td>
  </tr>
  <tr>
    <td height="7" align="right"><a href="?dattour=<?php echo $rows['matour']; ?>"><img src="anh/cooltext462726315MouseOver.png" style="margin:0px; border-color:#FFF" /></a></td>
    <td height="7" align="left"><a href="index.php"><img src="anh/cooltext462726487.png" style="margin:0px; border-color:#FFF" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><img src="anh/chuan.jpg"></td>
  </tr>
</table>
