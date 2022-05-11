'use strict';
var $ = jQuery;

var $storeslotsAdmin = {
    storeslot_settings_form  : "#storeslots_settings_form",
    
    init_storeslots_admin: function(){   
        jQuery(document).ready(function($) {
            $('.storeslots_select2').select2();

            // toaster configuration
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            
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

            // submit One click checkout setting form
            $($storeslotsAdmin.storeslot_settings_form).on( 'submit', function(e){
                $storeslotsAdmin.submit_storeslot_settings(e);
            });
                   
        });
    },

    //Handle Opening Schedules
    handle_opening_schedules: function () {

        // for opening schedules
        var checkBoxElements = $('.storeslots-weak-common');
        if( checkBoxElements.length > 0 ){
            checkBoxElements.each(function( index, item ){
                if( $(item).prop("checked") == true ){
                    $(item).parents(".storeslots_inputs").find(".storeslots_text_control").removeClass("disabled-day");
                }
            });
        }
       
        // for default opening schedules
        $('input.storeslots-weak-common').change(function () {

            //check input
            if ( $(this).prop("checked") == true) {
                $(this).parents(".storeslots_inputs").find(".storeslots_text_control").removeClass("disabled-day");
                      
            } else {
                $(this).parents(".storeslots_inputs").find(".storeslots_text_control").addClass("disabled-day");
            }

        });

    },

    // submit settings from
    submit_storeslot_settings : function (e) {
        e.preventDefault();
        let $submit_button = $('.storeslots-btn');
        $submit_button.text( 'Please Wait....' );
        $submit_button.addClass( '.storefusion-fcss-btn-disabled' );
        $submit_button.prop( 'disabled', true );

        let $post_data = {'action': 'storeslot_save_settings', 'data': $($storeslotsAdmin.storeslot_settings_form).serializeArray()};

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: $post_data,
            success: function(res){
                var $obj = JSON.parse(res);
                if ($obj.status == 'true') {
                    Command: toastr["success"]("Settings Saved Successfully!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('.storefusion-fcss-btn-disabled');
                    $submit_button.prop('disabled', false);
                }else{
                    Command: toastr["error"]("Failed, Please try again!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('.storefusion-fcss-btn-disabled');
                    $submit_button.prop('disabled', false);
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
    }


};

//load js for backend
$storeslotsAdmin. init_storeslots_admin();