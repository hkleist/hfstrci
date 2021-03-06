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
              <span>Created by <a title="Visit HousesforSaletoRent.co.uk!" href="<?php echo $this->config->base_url(); ?>" target="_blank">Houses for sale & to Rent team</a>. - <a href="<?php echo $this->config->base_url(); ?>/termsandconditions" style="color:darkgreen;">Terms of Use & Privacy Policy</a></span>
              <br>
            </div>
            <div class="col-xs-12 col-sm-6 logo-block">
              <div class="logo-image">
                <a href="<?php echo $this->config->base_url(); ?>"><img src="<?php echo $this->config->base_url(); ?>/images/houses-for-sale-to-rent.png" alt="Houses for Sale & to Rent"></a>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
  
  <!-- <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/bootstrap.min.js.gz"></script> -->
<!--  <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/jquery.parallax-1.1.3.js.gz"></script> -->
  <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/SmoothScroll.js.gz"></script>
<!--  <script type="text/javascript" async  src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/lock.min.js.gz"></script> -->
  <script async type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/unveil.js.gz"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhqHhs7yOY46r2H-71JhTA8dGorPqIu30"></script>
  <script async type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/script.js.gz"></script>
 <!-- <script src="//my.hellobar.com/6049964f0fdcb99f5f1918dc0ebaecdebb0dae92.js" type="text/javascript" charset="utf-8" async="async"></script>
  -->
<script type="text/javascript">
  $(document).ready(function(){
      $ = jQuery.noConflict();

      $("#email_error").hide();


      $('button#submit').click(function(){

        var email       = $('#email').val();
        var enquirytype = $('button#savesearch').attr('data-type');
        var minprice    = $('input[name=price1]').val();
        var maxprice    = $('input[name=price2]').val();
        var geo1        = $('button#savesearch').attr('data-geo1');
        var geo2        = $('button#savesearch').attr('data-geo2');
        var geo3        = $('input[name=search]').val();
        var minbed      = $('select[name=bedroom1] option:selected').val();
        var maxbed      = $('select[name=bedroom2] option:selected').val();
        var proptype    = $("input[type='checkbox']:checked").map(function() {return this.value;}).get().join(',');

        var error = false;

        if(email.length == 0 || email.indexOf("@") == "-1" || email.indexOf(".") == "-1"){
          var error = true;
          $("#email_error").fadeIn(500);
        }else{
          $("#email_error").hide();
        }
        
        if(error ==false){
          $.ajax({
              type:"POST",
              url:window.location.origin+"/houses/saveSub",
              crossDomain: true,
              data: "email=" + email + "&enquirytype=" + enquirytype + "&minprice=" + minprice + "&maxprice=" + maxprice + "&geo1=" + geo1 + "&geo2=" + geo2 + "&geo3=" + geo3 + "&minbed=" + minbed + "&maxbed=" + maxbed + "&proptype=" + proptype,
              success: function(data) {
                  $("#formSubcribe").modal('hide'); 
                  $('#infosubmit').html(data);
                  $("#thankyoupage").modal('show');
                  setInterval(function(){
                      $("#thankyoupage").modal('hide');
                    }, 3000);
              }
          });
        }
      });

    /* Save Listing Ajax*/
    $(".featured").click(function(){
      $ = jQuery.noConflict();

      $("#email_error_listing").hide();
      // $('#formListing').modal('show');

      var listingPrice  = $(this).data('price');
      var listingType   = $(this).data('type');
      var postCode      = $(this).data('postcode');
      var listingId     = $(this).data('listingid');
      var lat           = $(this).data('lat');
      var lng           = $(this).data('lng');
      
      submitList(listingPrice, listingType, postCode, listingId, lat, lng);     
    });

    function submitList(listingPrice, listingType, postCode, listingId, lat, lng){
      $('button#submitListing').click(function(){
          var emailListing  = $('#emailListing').val();

          var error = false;
          if(emailListing.length == 0 || emailListing.indexOf("@") == "-1" || emailListing.indexOf(".") == "-1"){
            var error = true;
            $("#email_error_listing").fadeIn(500);
          }else{
            $("#email_error_listing").hide();
          }

          if(error == false){
            $.ajax({
                type:"POST",
                url:window.location.origin+"/houses/saveListing",
                crossDomain: true,
                data: "email=" + emailListing + "&listingPrice=" + listingPrice + "&listingType=" + listingType + "&postCode=" + postCode + "&listingId=" + listingId + "&lat=" + lat + "&lng=" + lng,
                success: function(data) {
                    $("#formListing").modal('hide'); 
                    $('#infosubmit').html(data);
                    $("#thankyoupage").modal('show');
                    setInterval(function(){
                      $("#thankyoupage").modal('hide');
                    }, 3000);
                }
            });
          }
      });  
    }
     
  });
</script>

<!-- Thanks -->
<div class="modal fade" id="thankyoupage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id="infosubmit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
