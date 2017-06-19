<table border="0" width=650 cellspacing="10" cellpadding="5">
<tr>
<?php
$d = 0;
$str = "Select * from tourdulich where tentour like "Tour Bà Nà%" order by matour desc limit $start,$row_per_page";
//echo $str;
$result = mysql_query($str);
while($rows = mysql_fetch_array($result)){
/*$d = $d + 1;*/
?>
<td>
<table border=0>
<tr>
<td align="center" id="image" style="margin:5px;" >
<div style="boder:1px solid black;">
<a href="?tour=<?php echo $rows['matour']; ?>"><img src="anhtourdulich/<?php echo $rows['anh']; ?>" alt="Profile Photo" width="160" title="<?php echo $rows['tentour']; ?>"  height="200" style="border:2px solid #f2f2f2"></a>
</div>
</td>
</tr>
<tr>

<td height=30 align="center" width="200px">
<font style="color:#32bae0;">
 
<a href="?tour=<?php echo $rows['matour']; ?>" style="text-decoration:none;">
<span style="align:center;text-decoration:none;">
<?php echo $rows['tentour']; ?><br>
<?php echo $rows['giatien'].'$'; ?><br />
<?php echo $rows['songay'].' ngày'; ?>
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