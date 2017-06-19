<?php
	include('dbconect.php');
	$role=0;
	if(isset($_SESSION['username']))
	{
		$u=$_SESSION['username'];
			$sql="select * from thanhvien where username='$u'";
			$result=mysql_query($sql);
			$rows=mysql_fetch_array($result);
			$role=$rows['quyen'];
	}
?>
<div align="center">
<form action="" style="background-color:#333333"> 
<table width="1000" border="0" cellpadding="0" cellspacing="0" class="mainmenu" >
   <tr>
   <td width="950" align="center" valign="middle" >
      
		<div class="menu">
			<ul>
            	<li><a href="index.php" title="Trang Chủ">Trang Chủ</a></li>

                 <?php
				if(($role=='1') or ($role=='2'))
				{
				?>
             	<li><a href="" title="Cập nhật thông tin">Cập nhật thông tin &nabla; </a>
					<ul>
                    	<li><a class="drop" href="index.php?top=21">Thêm loại hoạt động</a></li>
						<li><a class="drop" href="index.php?top=17">Thêm hoạt động</a></li>
                        <li><a class="drop" href="index.php?top=22">Thêm loại hình du lịch</a></li>
						<li><a class="drop" href="index.php?top=20">Thêm tài nguyên</a></li>
                        <li><a class="drop" href="index.php?top=19">Thêm Khách Sạn</a></li>
                        <li><a class="drop" href="index.php?top=27">Thêm loại nhà hàng</a></li>
                        <li><a class="drop" href="index.php?top=25">Thêm nhà hàng</a></li>
                       <!-- <li><a class="drop" href="index.php?top=26">Thêm hướng dẫn viên</a></li>-->
                        <li><a class="drop" href="index.php?top=24">Thêm loại tour du lịch</a></li>
                        <li><a class="drop" href="index.php?top=18">Thêm tour du lịch</a></li>
                    </ul>
				</li>
                  <?php
				}else
				{
				?>
					<li><a href="index.php?top=35" title="Giới thiệu về Hà Nội">Cẩm nang du lịch</a>
					<!--<ul>
						<li><a class="drop" href="index.php?top=1">Du lịch Đà Nẵng</a></li>
                        <li><a class="drop" href="index.php?top=2">Lịch sử</a></li>
						
					
					</ul>-->
				</li>
                <li><a href="" title="Thông tin hữu ích">Dịch vụ du lich &nabla; </a>
					<ul>
						<li><a class="drop" href="index.php?top=7">Các tour du lịch</a></li>
                        <li><a class="drop" href="index.php?top=8" >Nhà Hàng</a></li>
						<li><a class="drop" href="index.php?top=9">Khách Sạn</a></li>
                    </ul>
				</li>
               <li><a href="index.php?top=33" title="Các hoạt động du lịch">Các hoạt động du lịch &nabla; </a>
					<ul>
						<li><a class="drop" href="index.php?top=12">Ẩm Thực</a></li>
						<li><a class="drop" href="index.php?top=13">Lễ Hội</a></li>
                    </ul>
				</li>
				<?php
				}
				?>
                 <?php
				if($role=='2')
				{
				?>
				<li><a href="" title="Cập nhật thông tin">Sửa thông tin &nabla; </a>
					<ul>
                        <li><a class="drop" href="index.php?top=23">Sửa thông tin khách sạn</a></li>
                        <li><a class="drop" href="index.php?top=28">Sửa tour du lịch</a></li>
                         <li><a class="drop" href="index.php?top=29">Sửa Xóa nhà Hàng</a></li>
                         <li><a class="drop" href="index.php?top=30">Sửa xóa chi tiết hoạt động</a></li>
                        <!-- <li><a class="drop" href="index.php?top=31">Sửa thông tin hd viên</a></li>-->
                        <!-- <li><a class="drop" href="index.php?top=32">Sửa tài nguyên du lịch</a></li>-->
           			</ul>
				</li>
              	   <?php
				}
				?>
				<?php
				if($role=='2')
				{
				?>
				<li><a href="index.php?top=36" title"danh sách khách hàng đặt tour">Thông tin tour được đặt</a></li>
				<?php
				}
				?>
				<?php
				if($role=='2')
				{
				?>
				<li><a href="index.php?top=39" title"Thống kê">Thống kê</a></li>
				<?php
				}
				?>
			</ul>
     	</div>
    
	</td>
    </tr>
</table>
</form>
</div>