  <!-- START FOOTER -->
    <footer class="footer">
      <!-- START FOOTER NAVIGATION -->
      <div class="footer-nav">
        <div class="container">
          <div class="row">
            <!-- START FOOTER ABOUT US -->
            <div class="col-xs-12 col-sm-6 col-md-3 footer-nav-col">
              <div class="ft-about-us">
                <h4 class="ft-col-title">Houses for Sale to Rent</h4>
                <div class="text-block">
                  <p>Houses for Sale & to Rent brings wide range of choice, steadily updated property list and market trend for you to figure out your right decision.</p>
                  <p>You are now at right place for your property research.</p>
                </div>
              </div>
            </div>
            <!-- END ABOUT US -->
            <div class="col-xs-12 col-sm-12 col-md-9 footer-nav-col">
     
     
     	<?php
     	
     		$cl = ceil(count($links)/6);
     	$i = 0;
     	
     	echo ' <div class="col-xs-12 col-sm-6 col-md-2 footer-nav-col">';
	echo '    <div class="ft-useful-links">';
	echo '      <h4 class="ft-col-title">Useful links</h4>';
	echo '      <nav class="useful-links-menu" role="navigation">';
	echo '        <ul>';
		          
     	foreach($links as $link){
     	
     		if($i % $cl == 0 && $i > 0  ){   
     		  
	     		  echo '        </ul>';
			  echo '      </nav>';
			  echo '    </div>';
			  echo '  </div>';       
		          echo ' <div class="col-xs-12 col-sm-6 col-md-2 footer-nav-col">';
		          echo '    <div class="ft-useful-links">';
		          //echo '      <h4 class="ft-col-title">Useful links</h4>';
		          echo '      <nav class="useful-links-menu" role="navigation">';
		          echo '        <ul>';
          	}
          
          
          echo ' <li class="menu-item"><a href="'.$link->link.'">'.$link->title.'</a></li>';
          
                    	
		$i++;
           
           }
           
        echo '        </ul>';
	echo '      </nav>';
	echo '    </div>';
	echo '  </div>';
           
           ?>
           
           
           
           
           
           
          </div>


            
          </div>
        </div>
      </div>
      <!-- END FOOTER NAVIGATION -->

      <!-- START COPYRIGHT -->
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 text-block">
              &copy; 2015 Houses for Sale to Rent. All Rights Reserved.
              <br />
              <span>Created by <a title="Visit HousesforSaletoRent.co.uk!" href="<?php echo $this->config->base_url(); ?>" target="_blank">Houses for sale & to Rent team</a>.</span>
              <br>
            </div>
            <div class="col-xs-12 col-sm-6 logo-block">
              <div class="logo-image">
                <a href="<?php echo $this->config->base_url(); ?>"><img src="{$logo}" alt="Houses for Sale & to Rent"></a>
              </div>
            </div>
          </div>          
        </div>
       
        <!-- START BACK TO TOP -->
        <div id="back-to-top" class="back-to-top">
          <i class="fa fa-angle-up"></i>
        </div>
        <!-- END BACK TO TOP -->
      </div>
      <!-- END COPYRIGHT -->
    </footer>
    <!-- END FOOTER -->
  </div>
  <!-- END SITE -->

  <!-- JQUERY PLUGIN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/SmoothScroll.js"></script>

  <!-- THEME SCRIPT -->
  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/script.js"></script>
  
  <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/lock.min.js"></script>
  <script type="text/javascript">


$(function() {
$.lockfixed(".find-property",{offset: {top: 145, bottom: 500}});

/*    var $sidebar   = $(".find-property"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 185;
    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });*/
    
});
  </script>

</body>

</html>