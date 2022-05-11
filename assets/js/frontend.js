
'use strict';
var $ = jQuery;

var $storeslotsFrontend = {
    storeslot_settings_form  : "#storeslots_settings_form",
    
    init_storeslots_frontend: function(){   
        jQuery(document).ready(function($) {
           
         // Trigger Opening Schedules
            $storeslotsFrontend.handle_order_type();
          
        });
    },

    //Handle Opening Schedules
    handle_order_type: function () {
        $("#storeslots_custom_checkout_schedule").hide();

        $('#storeslots_custom_checkout_field select').change(function () {
            $("#storeslots_custom_checkout_schedule").show();
        });

    },




};

//load js for backend
$storeslotsFrontend. init_storeslots_frontend();