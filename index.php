<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Du Lịch Đà Thành</title>
<link rel="stylesheet" type="text/css" href="css/bodystyles.css" />
<link rel="stylesheet" type="text/css" href="css/menuleft.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/pyboiz.com.css" />
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
if(isset($_SESSION['username']))
{
echo '<style>';
echo '.menu{width:900px; }';
echo '</style>';
}
?>


</head>
<body>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" >
  <tr>
    <td height="200" colspan="3" background="anh/bannerdep.jpg" ></td>
  </tr>
  <tr>
    <td height="40" colspan="3"><?php include "top.php";?></td>
  </tr>
  <tr>
    <td width="150" valign="top"><?php include "left.php";?></td>
    <td width="600" valign="top"><?php include "center.php";?></td>
    <td width="200" valign="top"><?php include "right.php"; ?></td>
  </tr>

  
 <!-- <tr>
    <td height="72" colspan="3" background="anh/banners-sanya.jpg">&nbsp;</td>
  </tr> -->
  <tr>
	<td colspan="3">
		<div class="footer">
			<ul>
				<li class="td">Công ty thương mại cổ phần dịch vụ du lịch KN Đà Nẵng</li>
				<li>Địa chỉ:1999 Nguyễn Tri Phương-Hải Châu-Đà Nẵng</li>
				<li>Điện thoại: 0935990914</li>
				<li>Website: http://www.dulichdathanh.com.vn</li>
				<li>Email: duongthanhdung101095@gmail.com</li>
				
			</ul>
			<span>© Copyright 2015 Công ty TMCP&DV KN Đà Nẵng: 0935990914 All Rights Reserved.</span>

		</div>
	</td>
  </tr>
</table>


</body>
</html>