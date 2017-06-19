<?php

@$id = $_REQUEST["uploadpictour"];
function getTour($id){
		$query 	= "SELECT * FROM tourdulich WHERE matour='$id' ";
		$result = mysql_query($query)or die("getTour :".mysql_error());
		$row	= mysql_fetch_array($result);
		return $row;
		}
function addProfilePhoto($id,$photo){
		$query		= "UPDATE tourdulich SET anh='$photo' WHERE matour='$id'";
		$result		= mysql_query($query) or die('addProfilePhoto: '.mysql_error());
		return $result;
	}
if (isset($_POST["btn_submit"])){
	
	$date 		= date('Y-m-d-h-m-s');
	$PhotoImage	= $_FILES["photo"]["name"];
	if ($PhotoImage != ""){
		$check_query	= true;
		if ($check_query == true){
			$uploaddir	= "anhtourdulich/";
			$uploadfile	= $date."_".basename($PhotoImage);
			move_uploaded_file($_FILES["photo"]["tmp_name"], $uploaddir.$uploadfile);
		}			
		if ($check_query==true){
			$PhotoImage		= $date."_".basename($PhotoImage);
			addProfilePhoto($id, $PhotoImage);
			$check_inform = '<div class="warning"><span>Thay đổi hình thành công </span></div>';
		}
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Chọn hình ảnh:</td>
							<td><input type="file" name="photo"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="btn_submit" value="Submit"/></td>
						</tr>
						<tr>
							<td colspan="2"><?php if(isset($check_inform)) echo $check_inform; ?></td>
						</tr>
					</table>
					<?php 
            		$Anh = getTour($id);
            		$photo = $Anh["anh"];
            		if ($photo != "")	print ('<img src="anhtourdulich/'.$photo.'" alt="Profile Photo" width="504" height="300">');
            		else print ('<img src="" alt="No Photo" width="504" height="300">');
					?>
</form>