<link rel="stylesheet" href="slide_anh/public/css/flexslider.css" type="text/css" media="screen" />
<div id="main">
					<div class="left"></div>
					<div class="right">
						<section class="slider">
					        <div class="flexslider">
					          <ul class="slides">
					            <li>
					  	    	    <a href="index.php?tour=20"><img height="150" src="slide_anh/public/images/songhan.jpg" /></a>
					  	    		</li>
					  	    		<li>
					  	    	    <a href="index.php?tour=19"><img height="150"src="slide_anh/public/images/bien.jpg" /></a>
					  	    		</li>
					  	    		<li>
					  	    	   	<a href="index.php?tour=10"> <img height="150"src="slide_anh/public/images/bana.jpg" /></a>
					  	    		</li>
					  	    		<li>
					  	    	    <a href="index.php?tour=12"><img height="150"src="slide_anh/public/images/culaocham.jpg" /></a>
					  	    		</li>
					  	    		<li>
					  	    	    <a href="index.php?tour=31"><img height="150"src="slide_anh/public/images/hoian.jpg" /></a>
					  	    		</li>
					  	    		
					          </ul>
					        </div>
					      </section>
					</div>
					 <!-- jQuery -->
					  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
					  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
					
					  <!-- FlexSlider -->
					   <script defer src="slide_anh/public/css/jquery.flexslider.js"></script>
					
					  <script type="text/javascript">
					    $(function(){
					      SyntaxHighlighter.all();
					    });
					    $(window).load(function(){
					      $('.flexslider').flexslider({
					        animation: "slide",
					        start: function(slider){
					          $('body').removeClass('loading');
					        }
					      });
					    });
					  </script>
				</div>