<?php
	//lấy ngày tháng năm hiện tại
	$now = getdate(); 
    $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"]; 
    $currentDate = $now["mday"]; 
	$currenmon =  $now["mon"];
	$currenyear = $now["year"]; 
    $currentWeek = $now["wday"] . ".";  
	
	
	 require_once('function.php');
	 if(isset($_POST['ok']))
{	
	
	$hoten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$diemdon=$_POST['diemdon'];
	$ghichu=$_POST['ghichu'];
	$ngay=$_POST['ngay'];
	$thang=$_POST['thang'];
	$nam=$_POST['nam'];
	$nguoilon=$_POST['nguoilon'];
	$treem=$_POST['treem'];
	$thanhtoan=$_POST['thanhtoan'];
	if($hoten=="" || $diachi=="" || $sdt==""  || $diemdon=="" || $ngay=="0" || $thang=="0" || $nam=="0" || $nguoilon=="0" ||  $thanhtoan=="")
	{
		echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
	}else{
		
				$day_tm=date('d');
				$month_tm=date('m');
				$year_tm=date('Y');
				
				if($year_tm==$nam)
				{
						if ($month_tm > $thang )
						{
							echo '<script>alert("Tháng khởi hành không đúng")</script>';
						}else{
							if($thang=='02' && ($ngay==29 || $ngay==30 || $ngay==31 ))
							{
								echo '<script>alert("Ngày khởi hành không đúng")</script>';
								$check_thang2=1;
								
							}
							if($month_tm == $thang ){
								
								if($day_tm > $ngay)
								{
									echo '<script>alert("Ngày khởi hành không đúng")</script>';
									$check_ngay=1;
									
								}if($day_tm == $ngay) {
									
									echo '<script>alert("Không được trùng với ngày hiện tại ")</script>';
									$check_ngay2=1;
								}else{
									if(!isset($check_thang2) && !isset($check_ngay) && !isset($check_ngay2)){
								
									$check=dattour($matour,$hoten,$diachi,$sdt,$email,$diemdon,$ghichu,$ngay,$thang,$nam,$nguoilon,$treem,$thanhtoan);
									$n= mysql_affected_rows();
									if($n!=0)
									{
										echo '<script>alert("Đăt tour thành công");window.location="index.php";</script>';
													
									}else{
										echo '<script>alert("Lỗi")</script>';
									}
								}
								}
							}
							if($month_tm < $thang ){
								if(!isset($check_thang2) && !isset($check_ngay) && !isset($check_ngay2)){
								
									$check=dattour($matour,$hoten,$diachi,$sdt,$email,$diemdon,$ghichu,$ngay,$thang,$nam,$nguoilon,$treem,$thanhtoan);
									$n= mysql_affected_rows();
									if($n!=0)
									{
										echo '<script>alert("Đăt tour thành công");window.location="index.php";</script>';
													
									}else{
										echo '<script>alert("Lỗi")</script>';
									}
								}
								
									
								
							}
							
							
						}//
				}else{
					if($thang=='02' && ($ngay==29 || $ngay==30 || $ngay==31 ))
							{
								echo '<script>alert("Ngày khởi hành không đúng")</script>';
								$check_thang2=1;
								
							}
					if(!isset($check_thang2)){
						$check=dattour($matour,$hoten,$diachi,$sdt,$email,$diemdon,$ghichu,$ngay,$thang,$nam,$nguoilon,$treem,$thanhtoan);
						$n= mysql_affected_rows();
						if($n!=0)
						{
							echo '<script>alert("Đăt tour thành công");window.location="index.php";</script>';
										
						}else{
							echo '<script>alert("Lỗi")</script>';
						}
					}		
					
					
				}
				
				
	
		}
}
?>


<html>
	<head>
		<title>Đặt tour</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="ajax/ajax.js" type="text/javascript"></script>
	</head>
	<body>
		<h1 style=color:blue>Đặt tour du lịch | Booking tour</h1>
		<p>Cám ơn quý khách đã chọn dịch vụ của chúng tôi. Chúng tôi cam kết sẽ đem lại cho quý khác một chuyến cu lịch trọn vẹn nhất</p><br/>
		
			
		
		<?php
			if(isset($_GET['dattour']))
			{
				$t=$_GET['dattour'];
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
			<td height="12" align="center"><font size="6" color="red"><?php echo number_format($rows['giatien']) ;?> VND</font><input type="hidden" name="giatien" id="giatien" value="<?php echo $rows['giatien']; ?>"></td>
		  </tr>
		    <tr>
			<td height="29"><span class="chu">Mã tour:</span> <font size="3" color="red"><?php echo $rows['matour'];
					
				?></font></td>
		  </tr>
		  <tr>
			<td height="31"><span class="chu">Số ngày:</span> <font color="red" size="3"><?php echo $rows['songay'];?></font></td>
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
			</tr>
		</table>
		
		
			<form name="frm-dangki" method="post" action="">
				<div id="div"  >
					<h3 class="ttlh"style=color:#2AC415>Thông tin liên hệ</h3>
				
				<table cellspacing="5" cellpadding="5" border=0>
					<tr>
						<td class="label">Họ và tên</td>
						<td>
							<input type="text" name="hoten" value="<?php if(isset($hoten)) echo $hoten; ?>"/>
							<span style="color:red;"><?php if(isset($hoten) && $hoten=="") echo ' (*)'; ?></span>
						</td>
					
					</tr>
					<tr>
						<td class="label">Địa chỉ</td>
						<td>
							<input type="text" name="diachi" value="<?php if(isset($diachi)) echo $diachi; ?>"/>
							<span style="color:red;"><?php if(isset($diachi) && $diachi=="") echo ' (*)'; ?></span>
						</td>
					</tr>
					<tr>
						<td class="label">Số điện thoại</td>
						<td>
							<input type="text" name="sdt" value="<?php if(isset($sdt)) echo $sdt; ?>"/>
							<span style="color:red;"><?php if(isset($sdt) && $sdt=="") echo ' (*)'; ?></span>
						</td>
					</tr>
					<tr>
						<td class="label">Email</td>
						<td>
							<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>"/>
							
						</td>
					</tr>
					<tr>
						<td class="label">Điểm đón</td>
						<td>
							<input type="text" name="diemdon" value="<?php if(isset($diemdon)) echo $diemdon; ?>"/>
							<span style="color:red;"><?php if(isset($diemdon) && $diemdon=="") echo ' (*)'; ?></span>
						</td>
					</tr>
					<tr>
						<td class="label">Ghi chú</td>
						<td>
							<textarea name="ghichu"cols="25" rows="3"><?php if(isset($ghichu)) echo $ghichu; ?></textarea>
							
						</td>
					</tr>
				
				</table>
			</div>
			<div id="div2">	
			<h3 class="ttlh"style=color:#2AC415>Thông tin đặt tour</h3>
				<p class="nkh">Ngày khởi hành không trùng với ngày đặt tour (*)</p>
			
				<table cellspacing="3" cellpadding="5" border="0">
					<tr>
						<td class="label">Ngày khởi hành</td>
						<td>
							<div>Ngày
								<select name="ngay">
									<option value="0">---</option>
									<?php
										if(isset($_POST['ok']))
											{
												$bday=$_POST['ngay'];
											}else{ $bday="";}		
										mangday($bday);
									?>
								</select>
								<span style="color:red;"><?php if(isset($ngay) && $ngay=="0") echo ' (*)'; ?></span>
							</div>
						</td>
						<td>
							<div>Tháng
								<select name="thang">
									<option value="0">---</option>
									<?php
										if(isset($_POST['ok']))
											{
												$bmonth=$_POST['thang'];
											}else{ $bmonth="";}	
										mangmonth($bmonth);
									?>
								</select>
								<span style="color:red;"><?php if(isset($thang) && $thang=="0") echo'(*)' ; ?></span>
							</div>
						</td>
						<td>
							<div>Năm
								<select name="nam">
									<option value="0">---</option>
									<?php
										if(isset($_POST['ok']))
											{
												$year=$_POST['nam'];
											}else{ $year="";}	
										mangyear($year);
									?>
								</select>
								<span style="color:red;"><?php if(isset($nam) && $nam=="0") echo'(*)'; ?></span>
							</div>
						</td>
					</tr><br/>
					<tr>
						<td class="label">Tổng số khách </td>
						<td>Người lớn
							<select name="nguoilon" id="nguoilon" onchange="ChangeNguoiLon();" >
								<option value="0" >---</option>
								<?php
										if(isset($_POST['ok']))
											{
												$nguoilon=$_POST['nguoilon'];
											}else{ $nguoilon="";}	
										songuoi($nguoilon);
									?>
							</select>
							<span style="color:red;"><?php if(isset($nguoilon) && $nguoilon=="0") echo ' (*)'; ?></span>
							
						</td>
						<td>Trẻ em
							<select name="treem" id="treem" onchange="ChangeTreEm();">
								<option value="0" >---</option>
								<?php
										if(isset($_POST['ok']))
											{
												$treem=$_POST['treem'];
											}else{ $treem="";}	
										songuoi($treem);
								?>
								</select>
								
						</td>
					</tr>
					<tr><td style=color:blue><b>Hình thức thanh toán:</b></td><td colspan="4">
					<select name="thanhtoan" id="thanhtoan" onchange="Thanhtoan();" >
						<option value="">Chọn hình thức thanh toán</option>
						<option value="vanphong">Trực tiếp tại văn phòng</option>
						<option value="nganhang">Chuyển khoản qua ngân hàng</option>
					</select>
					
				<!--	<input type="radio" name="vanphong" value="vanphong" onchange="Thanhtoan" id="thanhtoan" >Trực tiếp tại văn phòng<br>
					<input type="radio" name="thanhtoan" value="nganhang" onchange="Thanhtoan1" id="thanhtoan1">Chuyển khoảng ngân hàng<br> -->
					
					
					<span style="color:red;"><?php if(isset($thanhtoan) && $thanhtoan=="") echo ' (*)'; ?></span>
					</td></tr>
					<tr><td id="loading"></td><td colspan="4" id="results"></td></tr>
					<tr><td ></td><td colspan="4" id="results2"></td></tr>
				</table>
			</div>
				<div class="submit">
					
					<input type="submit" name="ok" value="Đặt tour"/>
				</div>
			</form>
			
		
	</body>
</html>

