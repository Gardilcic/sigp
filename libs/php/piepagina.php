                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    	<div class="navbar navbar-fixed-bottom">
      <div class="barra">
        <div class="container" style="width:80%;"></div>
      </div>
    </div>

    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/jquery.waterwheelCarousel.js"></script>
    <script src="libs/js/bootstrap-transition.js"></script>
    <script src="libs/js/bootstrap-alert.js"></script>
    <script src="libs/js/bootstrap-modal.js"></script>
    <script src="libs/js/bootstrap-dropdown.js"></script>
    <script src="libs/js/bootstrap-scrollspy.js"></script>
    <script src="libs/js/bootstrap-tab.js"></script>
    <script src="libs/js/bootstrap-tooltip.js"></script>
    <script src="libs/js/bootstrap-popover.js"></script>
    <script src="libs/js/bootstrap-button.js"></script>
    <script src="libs/js/bootstrap-collapse.js"></script>
    <script src="libs/js/bootstrap-carousel.js"></script>
    <script src="libs/js/bootstrap-typeahead.js"></script>




<script type="text/javascript" src="libs/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="libs/js/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="libs/js/jquery.tablesorter.pager.js"></script>

    <script>
    	$(document).ready(function() {
    		
   			$("#carousel").waterwheelCarousel({
   			clickedCenter: function($clickedItem) {
			      // $clickedItem is a jQuery wrapped object describing the image that was clicked.
			      var imageUrl = $clickedItem.attr('src');
			      var id = $clickedItem.attr('menu');
			      $('.barra-menu').css('display','none');
			      $("#"+id).css('display','block');
			      //alert('The center image was just clicked. The URL of the image is: ' + imageUrl);
			},
			movedToCenter: function($newCenterItem) {
			  // $newCenterItem is a jQuery wrapped object describing the image that was clicked.
			  var imageID = $newCenterItem.attr('id'); // Get the HTML element "id" for this image. Let's say it's "tigerpicture"
			  // Now that we have the ID of the image, we can use jQuery to show the content corresponding to the tigerpicture.
			  $('#'+imageID+'-information').show(); // this will show the HTML element with id of "tigerpicture-information" on your site.
			  var id = $newCenterItem.attr('menu');
			  $('.barra-menu').css('display','none');
			  $("#"+id).css('display','block');
                          if(id=="menu1")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#cbead3))" });
                          else if(id=="menu2")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#5cc8e5))" });
                          else if(id=="menu6")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#479670))" });
                          else if(id=="menu5")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#8596b8))" });
                        else if(id=="menu4")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#fff587))" });
                        else if(id=="menu3")
                            $('.navbar-inner').css({ background: "-webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#ffb424))" });
                        
                        
                        
			}
			  // include options like this:
			  // (use quotes only for string values, and no trailing comma after last option)
			  // option: value,
			  // option: value
			});   		
		});
    </script>
