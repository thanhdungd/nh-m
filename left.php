<div class="left_menu">

<ul>
	<li class="mc"><a href="index.php?left=7">Tìm kiếm tour du lịch</a></li>   
	<li class="mc"><a href="index.php">TRANG CHỦ</a></li>
    	<?php
		if(isset($_SESSION['username']))
		{
		$username=$_SESSION['username'];
		$query =mysql_query("select * from thanhvien where username='$username'");
		$row=mysql_fetch_array($query);
		?>
        	
        	<li class="c"><a href="#"><b>Xin chào <?php echo $row['username']; ?></b></a></li>
        	<!--<li class="c"><a href="index.php?left=3">Thông tin thành viên</a></li>-->
			<li class="c"><a href="index.php?left=4">Thoát</a></li>
            <?php
			require_once('dbconect.php');
            $u=$_SESSION['username'];
			$sql="select * from thanhvien where username='$u'";
			$result=mysql_query($sql);
			$rows=mysql_fetch_array($result);
			if($rows['quyen']=='2')
			{
				?>
               
                <?php
					
			}
		}
		else
		{
			?>
			
          <!--  <li class="c"><a href="index.php?left=1">Đăng Ký</a></li>-->
			<li class="c"><a href="index.php?left=2">Đăng Nhập</a></li>
            <?php	
		}
		if(isset($_SESSION['tour']))
		{
			?>
			<li class="c"><a href="index.php?left=6">Tour bạn đặt</a></li>
            <?php
		}
	?>
		<li class="mc"><a href="">Các tour thiên nhiên</a></li>
        <?php
			require_once('dbconect.php');
			$sql="select * from tourdulich where maloaitour='1'";
			$result=mysql_query($sql);
			while($rows=@mysql_fetch_array($result))
			{
			?>
                <li class="c"><a href="index.php?tour=<?php echo $rows['matour'] ;?>"><?php echo $rows['tentour'] ;?></a></li>
             <?php	
			}
		?>
        <li class="mc"><a href="">Các tour lễ hội-Sự kiện</a></li>
    		<?php
			require_once('dbconect.php');
			$sql="select * from tourdulich where maloaitour='2'";
			$result=mysql_query($sql);
			while($rows=@mysql_fetch_array($result))
			{
			?>
                <li class="c"><a href="index.php?tour=<?php echo $rows['matour'] ;?>"><?php echo $rows['tentour'] ;?></a></li>
             <?php	
			}
		?>
  		<li class="mc"><a href="">Tour du lịch mạo hiểm</a></li>
        	<?php
			require_once('dbconect.php');
			$sql="select * from tourdulich where maloaitour='3'";
			$result=mysql_query($sql);
			while($rows=@mysql_fetch_array($result))
			{
			?>
                <li class="c"><a href="index.php?tour=<?php echo $rows['matour'] ;?>"><?php echo $rows['tentour'] ;?></a></li>
             <?php	
			}
		?>
        
 	</ul>    
</div>  
