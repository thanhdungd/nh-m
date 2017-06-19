<?php 
	include('dbconect.php');
	$sql="select * from camnang";
	$result=mysql_query($sql);
	
?>
	<table width="600" border="0">
  <tr>
    <td colspan="2" align="left"> <font size="4" color="#FF0000">Cẩm nang du lịch</font></td>
    </tr>
  <tr>
    <td height="17" colspan="2"><img src="anh/chuan.jpg"></td>
    </tr>
    <?php
		while($rows=mysql_fetch_array($result))
		{
	?>
  <tr>
    <td width="207" rowspan="2"><img src="anhdanang/<?php echo $rows['anh'];?>" width="200" height="150"></td>
    <td width="389" height="21"><font size="3" color="#0033FF"><?php echo $rows['ten'] ;?></font></td>
  </tr>
  <tr>
    <td><?php echo substr($rows['chitiet'],0,220).'...' ;?>
	<a href="index.php?chitietdanang=<?php echo $rows['ma'];?>">chi tiết>></a>
	</td>
  </tr>
  <tr>
    <td height="17" colspan="2"><img src="anh/chuan.jpg"></td>
    </tr>
  <?php
	}?>
        
</table>

