jQuery(document).ready( function() {
    jQuery("#filter-vehicles").click( function(e) {
       e.preventDefault(); 
       vehicleMeta = {
           'vehicle_title' : jQuery("#vehicle-title").val(),
           'vehicle_type' : jQuery("#vehicle-type").val(),
           'vehicle_number' : jQuery("#vehicle-number").val(),
           'driver_name' : jQuery("#driver-name").val(),
       };
       jQuery.ajax({
          type : "post",
          dataType : "json",
          url : myAjax.ajaxurl,
          data : {action: "filter_vehicles", data : vehicleMeta},
          success: function(response) {
              console.log(response)
              jQuery(".vehicle-listing-wrap").html(response.html)
          }
       });
    });
 });