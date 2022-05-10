'use strict';
var $ = jQuery;

var $storeslotsAdmin = {
    
    init_storeslots_admin: function(){

        jQuery(document).ready(function($) {
            $('.storeslots_select2').select2();
            
            $(".storeslots_right_content .storeslots_tab_body").hide();
            $(".storeslots_right_content .storeslots_tab_body[data-id='order_settings']").show();

            $(".storeslots_data_tabs .tab_item").unbind("click");
            $(".storeslots_data_tabs .tab_item").bind("click", function () {

                $(".storeslots_data_tabs .tab_item").removeClass('tab_item_active');
                $(this).addClass('tab_item_active');

                $(".storeslots_right_content .storeslots_tab_body").hide();
                $(".storeslots_right_content .storeslots_tab_body[data-id='" + $(this).data('target') + "']").show();
            });

            // Trigger Opening Schedules
            $storeslotsAdmin.handle_opening_schedules();
                   
        });
    },

    //Handle Opening Schedules
    handle_opening_schedules : function(){      
        $('input.storeslots-weak-common').click(function () {
            if ($('input.storeslots-weak-common').prop("checked") == true) {
                console.log("checked");
             }else{
                 console.log("Unchecked");
             }
        });
    },


};

//load js for backend
$storeslotsAdmin. init_storeslots_admin();