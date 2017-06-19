<?php 
	$n=$_POST['txtname'];
	$ks=$_POST['maks'];
	$gia=$_POST['txtgiatien'];
	$songay=$_POST['txtsongay'];
	$hdv=$_POST['mahdv'];
	$loaitour=$_POST['loaitour'];
	$hanhtrinh=$_POST['txthtrinh'];
	$m=$_POST['txtmatour'];
	include("dbconect.php");
	$sql="update tourdulich set tentour='$n' ,hanhtrinh='$hanhtrinh', giatien='$gia',maks='$ks',songay='$songay',maloaitour='$loaitour' where matour='$m'";
	//
	$result=mysql_query($sql);
	
	if($result)
	{
		
			?>
				<script language="javascript">
					window.location="index.php?tour=<?php echo "$m";?>";
                </script>
            <?php
	}
	else
	{
			?>
   				 <script language="javascript">
					window.location="<?php echo "$m";?>";
				</script>
                <?php
	}
?>