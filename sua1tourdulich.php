<?php
include('dbconect.php');
@$id=$_REQUEST['suatourdulich'];

function Ks($selected)
	 {
		$query="SELECT * from khachsan";
		$result=mysql_query($query) or die("Ks: ".mysql_error());
		while($row	= mysql_fetch_array($result))
		{	if($row["maks"] == $selected)
			{
				print('<option value="'.$row["maks"].'" selected>'.$row["tenks"].'</option>');
			}else{
				print('<option value="'.$row["maks"].'">'.$row["tenks"].'</option>');
			}					
		}
	 }
	 
function HDV($selected)
	 {
		$query="SELECT * from huongdanvien";
		$result=mysql_query($query) or die("HDV: ".mysql_error());
		while($row	= mysql_fetch_array($result))
		{	if($row["mahdv"] == $selected)
			{
				print('<option value="'.$row["mahdv"].'" selected>'.$row["tenhdv"].'</option>');
			}else{
				print('<option value="'.$row["mahdv"].'">'.$row["tenhdv"].'</option>');
			}					
		}
	 }
function LoaiTour($selected)
	 {
		$query="SELECT * from loaitourdulich";
		$result=mysql_query($query) or die("LoaiTour: ".mysql_error());
		while($row	= mysql_fetch_array($result))
		{	if($row["maloaitour"] == $selected)
			{
				print('<option value="'.$row["maloaitour"].'" selected>'.$row["tenloaitour"].'</option>');
			}else{
				print('<option value="'.$row["maloaitour"].'">'.$row["tenloaitour"].'</option>');
			}					
		}
	 }	 
?>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript">
function thoat()
{
	window.location="index.php";	
}
function checkInput()
{
		if(document.frmregister.txtname.value=="")
		{
			window.alert('Bạn chưa nhập tên tour du lịch');
			document.frmregister.txtname.focus();
			return false;
		}
		if(document.frmregister.txthtrinh.value=="")
		{
			window.alert('Bạn chưa nhập hanhtrinh');
			document.frmregister.txthtrinh.focus();
			return false;
		}
		if(document.frmregister.txtgia.value=="")
		{
			window.alert('Bạn chưa nhập giá tour');
			document.frmregister.txtgia.focus();
			return false;
		}
}
function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<?php
	if(isset($_GET['suatourdulich']))
	{
		//include('dbconect.php');
		$matour=$_GET['suatourdulich'];
		$sql="select * from tourdulich where matour='$matour'";
		$result=mysql_query($sql);
		$rows=@mysql_fetch_array($result);
		//echo $rows['maloaitour'];
?>
<form action="thucthisuatourdulich.php" method="post" name="frmregister" onSubmit="return checkInput();"  enctype="multipart/form-data">
  <div align="center"><table width="600" height="455" border="0" class="vitricenter">
  <tr>
  	<input name="txtmatour" type="hidden" value="<?php echo $rows['matour']; ?>" />
    <td height="31" width="200px" colspan="2" bgcolor="#66FFFF"><p class="dangky"><b>SỬA TOUR DU LỊCH</b></p></td>
    </tr>
  <tr>
    <td height="23" colspan="2"><p class="thongtin">Những thông tin có đánh dấu <font color="#FF0000">*</font>là bắt buộc</p></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><b><font color="#0099FF">Thông Tin về tour du lịch</font></b></td>
  </tr>
  <tr>
    <td  height="30" class="chu">Tên tour<font color="#FF0000">*</font></td>
    <td ><input type="text" name="txtname" id="textfield" size="45" value="<?php echo $rows['tentour']; ?>"></td>
  </tr>
  <tr><td>Danh mục khách sạn:</td><td><select name="maks" id="maks"  >
							<option value=""> Chọn khách sạn</option>
							<?php
								Ks($rows['maks']);
							?>
						</select> </td></tr>
  <tr>
    <td height="36" class="chu">Hình Ảnh</td>
    <td><a href="index.php?uploadpictour=<?php echo $id; ?>">Thay đổi</a></td>
  </tr>
  <tr>
    <td height="37" class="chu">Giá<font color="#FF0000">*</font></td>
    <td><input name="txtgiatien" type="text" value="<?php echo $rows['giatien'];?>" /></td>
  </tr>
  <tr>
    <td height="33" class="chu">Số ngày<font color="#FF0000">*</font></td>
    <td><input name="txtsongay" type="text" value="<?php echo $rows['songay'];?>" /></td>
  </tr>
  <tr>
    <td height="29" class="chu">Tên hướng dẫn viên</td>
    <td><select name="mahdv" id="mahdv"  >
							<option value=""> Chọn hdv</option>
							<?php
								HDV($rows['mahdv']);
							?>
						</select> </td>
  </tr>
  <tr>
    <td height="31" class="chu">Tên loại tour</td>
    <td><select name="loaitour" id="loaitour"  >
							
							<?php
								LoaiTour($rows['maloaitour']);
							?>
						</select> </td>
  </tr>
  <tr>
    <td height="31" class="chu">Hành trình<font color="#FF0000">*</font></td>
    <td><textarea name="txthtrinh" cols="40" rows="5" id="txthtrinh" ><?php echo $rows['hanhtrinh']; ?></textarea>
	<script type="text/javascript">CKEDITOR.replace( 'txthtrinh'); </script></td>
  </tr>
  <tr>
    <td height="85" colspan="2">  <div align="center">
             <input name="btnregister" type="submit"  value="" class="btncapnhat">
             <input type="button" name="btnthoat" class="btnexit" value="" onClick="thoat();" />
           </div></td>
    </tr>
 </table>
  </div>
</form>
<?php
	}
?>