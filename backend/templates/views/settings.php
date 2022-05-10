<div id="storeslots_dashboard">

    <form class="storeslots-settings-form" id="storeslots_settings_form">

        <div class="storeslots_content_wrapper">

            <div class="storeslots_bottom_form">
                <div class="content_wrapper">
                    <div class="storeslots_left_content">
                        <div class="storeslots_data_tabs">
                            <div class="tab_item tab_item_active" data-target="order_settings">
                                <h3> <?php _e('Order Settings', 'storeslots'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="opening_schedules">
                                <h3> <?php _e('Opening Schedules', 'storeslots'); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="storeslots_right_content">
                        <!-- Start order settings -->
                        <div data-id="order_settings" class="storeslots_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Order Settings', 'storeslots'); ?></h1>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Enable Delivery or Takeaway?', 'storeslots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <label class="toggle_switch">
                                                <input id="storeslots_enable_delivery_or_takeaway" class="storeslots_default_checked" name="storeslots_enable_delivery_or_takeaway" type="checkbox" value="yes">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small class="storeslots-hints">Enable if you want home delivery or picks orderd product from a takeaway location.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Order Type Label', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_order_type_label" id="" value="" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Order type field label</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Delivery Option Label', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_delivery_option_label" id="" value="" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Order type's home delivery option.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Takeaway Option Label', 'store-slots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_takeaway_option_label" id="storeslots_takeaway_option_label" value="" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Order type's takeaway delivery option.</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End order settings -->

                        <!-- Start Delivery Date -->
                        <div data-id="opening_schedules" class="storeslots_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Opening Schedules Settings', 'storeslots'); ?></h1>
                            </div>
                            <div class="title-wrapper">
                                <h4 class="weeakday-title"><?php _e('Weekday', 'storeslots'); ?></h4>
                                <h4 class="open_form"><?php _e('Open Hours (From)', 'storeslots'); ?></h4>
                                <h4 class="open_to"><?php _e('Open Hours (To)', 'storeslots'); ?></h4>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_saturday" value="saturday">
                                                <label for="storeslots_saturday">Saturday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="saturday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="saturday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" class="storeslots-weak-common"name="storeslots_sunday" value="sunday">
                                                <label for="storeslots_sunday">Sunday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="sunday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="sunday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" name="storeslots_monday" value="monday">
                                                <label for="storeslots_monday">Monday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="monday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="monday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" name="storeslots_tuesday" value="tuesday">
                                                <label for="storeslots_tuesday">Tuesday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="tuesday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="tuesday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" name="storeslots_wednesday" value="wednesday">
                                                <label for="storeslots_wednesday">Wednesday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="wednesday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="wednesday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" name="storeslots_thursday" value="thursday">
                                                <label for="storeslots_thursday">Thursday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="thursday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="thursday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" name="storeslots_friday" value="friday">
                                                <label for="storeslots_friday">Friday</label>
                                            </div>
                                            <input class="storeslots_text_control h50" type="time" name="friday_open_hour_start" id="" value="" placeholder="">
                                            <input class="storeslots_text_control storeslots_tt_custom h50" type="time" name="friday_open_hour_end" id="" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Delivery Date -->



                    </div>
                </div>

                <div class="storeslots_footer">

                    <button type="submit" class="storeslots-btn"> <?php _e('Save Settings', 'storeslots'); ?>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>