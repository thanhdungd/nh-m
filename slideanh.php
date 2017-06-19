<?php 
	include('dbconect.php');
?>
<div class="slide" style="margin-top:-16px">
	<center>
	<div class="iframe123Mua-kind04">
		<div class="topIframe"><h2> &raquo;&raquo;&raquo; <a href="#">Tour nổi bật</a> &raquo;&raquo;&raquo;</h2> </div>
		
		
		<div class="iframe123Mua-kind04-inside clear">
			<div class="contentIframe">
				<ul id="slider1">
				<?php
				$query="select * from tourdulich ";
				$result=mysql_query($query);
				$now=mysql_fetch_array($result);
				
				
				while($now=mysql_fetch_array($result))
				{
					echo '<li>';
					echo '<div class="product">';
					echo '<div class="pic"><a  href="#"><img src="anhtourdulich/'.$now['anh'].'" width="150" height="140" alt="" /></a></div>';
					echo '<h2 class="lstitle"><a  href="#">'.$now['tentour'].'</a></h2>';
					echo '</div>';
					echo '</li>';
				}
				?>
					
				</ul>

			</div>
			
		</div>
		
	</div>
	</center>

	</div>