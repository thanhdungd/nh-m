<?php
	include('dbconect.php');
		$stt=1;
		$query	= "SELECT * FROM dattour group by id desc ";
		$results= mysql_query($query)or die("listUser: ".mysql_error());
		//echo $query;
		$num=mysql_num_rows($results);
		//echo '<span style="color:red;">Có '.$num.' kết quả tìm kiếm!!!</span>';
		if($num>0)
		{
			print ('<table style="width:650px; margin-top:20px;" border=1  >
				   <tr>
						<th scope="col" ></th>
						<th scope="col">STT</th>
						<th scope="col">Mã tour</th>
						<th scope="col" >Họ và tên</th>
						 <th scope="col" >SDT</th>
						 <th scope="col" >Thời gian đặt</th>
						<th scope="col" >Thời gian đi</th>
					</tr>');
			while ($row = mysql_fetch_array($results))
			{
				
				print ('<tr>   
						   <td><a title="Chi tiết" href=index.php?top=37&id='.$row['id'].'>[...]</a>
						   <a title="Xóa" href="index.php?top=38&id='.$row['id'].'">[X]</a>
						   <td style="text-align:center;">'.$stt++.'</td>
						   <td>'.$row["matour"].'</td>
						   <td>'.$row["hoten"].'</td>
						   <td>'.$row["sdt"].'</td>
						   <td>'.$row["thoigian"].'</td>
							<td>'.$row["ngaydi"].'/'.$row["thangdi"].'/'.$row["namdi"].'</td> ');
						 
						   
						   
				
			}


			print ('</table>');
		}else{
			echo '<p>&nbsp</p>';
			echo 'Không có dữ liệu';
		}
		
		
		
	
	?>
