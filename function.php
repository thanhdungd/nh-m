<?php
if(isset($_GET['dattour'])){
	$matour=$_REQUEST['dattour'];
}

function getTour($matour){
	$query= "SELECT * FROM tourdulich  WHERE matour='$matour' ";
	//echo $query;
	$result=mysql_query($query);
	$row	= mysql_fetch_array($result);
	return $row;
}
function dattour($matour,$hoten,$diachi,$sdt,$email,$diemdon,$ghichu,$ngay,$thang,$nam,$nguoilon,$treem,$thanhtoan){
	$matour = mysql_real_escape_string(trim($matour));
	$hoten = mysql_real_escape_string(trim($hoten));
	$diachi = mysql_real_escape_string(trim($diachi));
	$sdt = mysql_real_escape_string(trim($sdt));
	$email = mysql_real_escape_string(trim($email));
	$diemdon = mysql_real_escape_string(trim($diemdon));
	$ghichu = mysql_real_escape_string(trim($ghichu));
	$ngay = mysql_real_escape_string(trim($ngay));
	$thang = mysql_real_escape_string(trim($thang));
	$nam = mysql_real_escape_string(trim($nam));
	$nguoilon = mysql_real_escape_string(trim($nguoilon));
	$treem = mysql_real_escape_string(trim($treem));
	$thanhtoan = mysql_real_escape_string(trim($thanhtoan));
	
	$Tour=getTour($matour);
	$giatien=$Tour['giatien'];
	$tien=(($giatien/2)*$treem)+($giatien*$nguoilon);
	$soluong=$nguoilon+$treem;
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time = date("Y/m/d");
	
	$query  = "INSERT INTO dattour(`matour`, `hoten`, `email`, `sdt` ,`songuoi`, `thoigian`, `ghichu`, `ngaydi`, `thangdi`, `namdi`, `thanhtoan`, `diemdon`, `tien`, `status`)
							VALUES('$matour','$hoten','$email','$sdt','$soluong','$time','$ghichu','$ngay','$thang','$nam','$thanhtoan','$diemdon','$tien','0')";
	//echo $query;
	$result = mysql_query($query)or die("dattour :".mysql_error());
	

}
function mangday($bday)
 {
	for ($i=1; $i<=31; $i++)
		{
		if(strlen($i)==1)
			{
				$i='0'.$i;
			}	
		if ($i==$bday){
			
			{
			echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
			}
		}
			
		else 
			{
			echo "<option value=\"" . $i . "\">" . $i . "</option>";
			}
		}
}
function mangmonth($bmonth)
{
	for ($i=1; $i<=12; $i++)
		{
		if(strlen($i)==1)
			{
				$i='0'.$i;
			}
		
		if ($i==$bmonth)
			{
			echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
			}
		else
			{
			echo "<option value=\"" . $i . "\">" . $i . "</option>";
			}
		}
}
function mangyear($year){
			
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$yearhere = date("Y");
	for ($i=$yearhere; $i<=$yearhere+5; $i++)
		{
			
			if ($i==$year)
			{
			echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
			}
		else
			{
			echo "<option value=\"" . $i . "\">" . $i . "</option>";
			}
		}
}

function mangyear_thongke($year){
			
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$yearhere = date("Y");
	for ($i=2010; $i<=$yearhere+5; $i++)
		{
			
			if ($i==$year)
			{
			echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
			}
		else
			{
			echo "<option value=\"" . $i . "\">" . $i . "</option>";
			}
		}
}

function songuoi($nguoilon){
			
	
	for ($i=1; $i<=60; $i++)
		{
			
			if ($i==$nguoilon)
			{
			echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
			}
		else
			{
			echo "<option value=\"" . $i . "\">" . $i . "</option>";
			}
		}
}


function ListThongKe_NAM($nam)
	{		
		if($nam!=0){
				//$nam=$day.'/'.$month.'/'.$year;
				$cond_day = "DATE_FORMAT(`thoigian`,'%Y') like '$nam'";
			}else{
				$cond_day = true;
			}
		
		$stt=1;
		$query	= "select * from dattour a, tourdulich b where a.matour=b.matour and $cond_day ";
		$results=mysql_query($query) or die("loi: ".mysql_error());
		$num=mysql_num_rows($results);
			if($num>0)
			{
				print ('<table style="width:550px; margin-top:20px;" border=0  >
					   <tr><td >Stt</td>
							<td >Tên khách hàng</td>
						   <td >Ngày đặt tour</td>
						   <td >Giá tiền</td>
						   <td >Số người</td>

							</tr>');
				print('<tr><td colspan=6><hr style="border:1px solid red"></td></tr>');	
					$tongtien=0;
				while ($row = mysql_fetch_array($results))
				{	
				$tongtien=$tongtien+$row['giatien'];

					print ('<tr>
							   <td style="text-align:center;">'.$stt++.'</td>
							   <td><a href="../view/index.php?id='.$row['id'].'">'.($row["hoten"]).'</td>
							   <td>'.$row["thoigian"].'</td>
							   <td>'.number_format($row["giatien"]).'</td>
							   <td>'.($row["songuoi"]).' '.'Người</td>');
													   
					print('<tr><td colspan=6><hr style="border:1px dashed gray"></td></tr>');	
					
				}
				print('<tr><td colspan=6>Tổng tiền:'.number_format($tongtien).'</td></tr>');	
				
				print ('</table>');	
				
			}else{
				echo '<p>&nbsp</p>';
				echo 'Không có dữ liệu';
			}
			echo"<br/>";
		
		
		$stt=1;
		$query	= "SELECT  DISTINCT(a.matour) AS ma_tour, COUNT(a.matour) AS solan,tentour,giatien FROM dattour a, tourdulich b WHERE a.matour=b.matour and $cond_day  GROUP BY ma_tour ";
		$results=mysql_query($query) or die("loi: ".mysql_error());
		$num=mysql_num_rows($results);
			if($num>0)
			{
				print ('<table style="width:550px; margin-top:20px;" border=0  >
					   <tr><td >Stt</td>
							<td >Tên tour</td>
						   
						   <td >Giá tiền</td>
						   <td >Số lần đặt</td>

							</tr>');
				print('<tr><td colspan=6><hr style="border:1px solid red"></td></tr>');	
					$tongtien=0;
				while ($row = mysql_fetch_array($results))
				{	
				

					print ('<tr>
							   <td style="text-align:center;">'.$stt++.'</td>
							   <td>'.($row["tentour"]).'</td>
							  
							   <td>'.number_format($row["giatien"]).'</td>
							   <td>'.($row[COUNT("matour")]).' '.'Lần</td>');
													   
					print('<tr><td colspan=6><hr style="border:1px dashed gray"></td></tr>');	
					
				}
				
				
				
				print ('</table>');	
				
			}else{
				echo '<p>&nbsp</p>';
				echo 'Không có dữ liệu';
			}
		
			
		
		
		
		
	}
	
	
	
	function ListThongKe_THANGNAM($nam,$thang)
	{		
		if($nam!=0 && $thang!=0){
				$date=$thang.'/'.$nam;
				$cond_day = "DATE_FORMAT(`thoigian`,'%m/%Y') like '$date'";
			}else{
				$cond_day = true;
			}
		
		$stt=1;
		$query	= "select * from dattour a, tourdulich b where a.matour=b.matour and $cond_day ";
		$results=mysql_query($query) or die("loi: ".mysql_error());
		$num=mysql_num_rows($results);
			if($num>0)
			{
				print ('<table style="width:550px; margin-top:20px;" border=0  >
					   <tr><td >Stt</td>
							<td >Tên khách hàng</td>
						   <td >Ngày đặt tour</td>
						   <td >Giá tiền</td>
						   <td >Số người</td>

							</tr>');
				print('<tr><td colspan=6><hr style="border:1px solid red"></td></tr>');		
				$tongtien=0;	
				while ($row = mysql_fetch_array($results))
				{	
					$tongtien=$tongtien+$row['giatien'];
					print ('<tr>
							   <td style="text-align:center;">'.$stt++.'</td>
							   <td><a href="../view/index.php?id='.$row['id'].'">'.($row["hoten"]).'</td>
							   <td>'.$row["thoigian"].'</td>
							   <td>'.number_format($row["giatien"]).'</td>
							   <td>'.($row["songuoi"]).' '.'Người</td>');
													   
					print('<tr><td colspan=6><hr style="border:1px dashed gray"></td></tr>');			   
					
				}
				print('<tr><td colspan=6>Tổng tiền:'.number_format($tongtien).' '.'VNĐ</td></tr>');			   
				print ('</table>');	
			}else{
				echo '<p>&nbsp</p>';
				echo 'Không có dữ liệu';
			}
					echo"<br/>";
		
		
		$stt=1;
		$query	= "SELECT  DISTINCT(a.matour) AS ma_tour, COUNT(a.matour) AS solan,tentour,giatien FROM dattour a, tourdulich b WHERE a.matour=b.matour and $cond_day GROUP BY ma_tour ";
		$results=mysql_query($query) or die("loi: ".mysql_error());
		$num=mysql_num_rows($results);
			if($num>0)
			{
				print ('<table style="width:550px; margin-top:20px;" border=0  >
					   <tr><td >Stt</td>
							<td >Tên tour</td>
						   
						   <td >Giá tiền</td>
						   <td >Số lần đặt</td>

							</tr>');
				print('<tr><td colspan=6><hr style="border:1px solid red"></td></tr>');	
					$tongtien=0;
				while ($row = mysql_fetch_array($results))
				{	
				

					print ('<tr>
							   <td style="text-align:center;">'.$stt++.'</td>
							   <td>'.($row["tentour"]).'</td>
							  
							   <td>'.number_format($row["giatien"]).'</td>
							   <td>'.($row[COUNT("matour")]).' '.'Lần</td>');
													   
					print('<tr><td colspan=6><hr style="border:1px dashed gray"></td></tr>');	
					
				}
				
				
				
				print ('</table>');	
				
			}else{
				echo '<p>&nbsp</p>';
				echo 'Không có dữ liệu';
			}
		
			
		
		
		
		
	}

?>