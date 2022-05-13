<?php 

    $storeslots_saturday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_saturday']) ? $this->storeslot_settings['storeslots_saturday'] : ''; 
    $storeslots_sunday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_sunday']) ? $this->storeslot_settings['storeslots_sunday'] : ''; 
    $storeslots_monday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_monday']) ? $this->storeslot_settings['storeslots_monday'] : ''; 
    $storeslots_tuesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_tuesday']) ? $this->storeslot_settings['storeslots_tuesday'] : ''; 
    $storeslots_wednesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_wednesday']) ? $this->storeslot_settings['storeslots_wednesday'] : ''; 
    $storeslots_thursday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_thursday']) ? $this->storeslot_settings['storeslots_thursday'] : ''; 
    $storeslots_friday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_friday']) ? $this->storeslot_settings['storeslots_friday'] : ''; 

    $saturday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_start']) ? $this->storeslot_settings['saturday_open_hour_start'] : ''; 
    $saturday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_end']) ? $this->storeslot_settings['saturday_open_hour_end'] : '';
    
    $sunday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_start']) ? $this->storeslot_settings['sunday_open_hour_start'] : ''; 
    $sunday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_end']) ? $this->storeslot_settings['sunday_open_hour_end'] : ''; 

    $monday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_start']) ? $this->storeslot_settings['monday_open_hour_start'] : ''; 
    $monday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_end']) ? $this->storeslot_settings['monday_open_hour_end'] : ''; 

    $tuesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_start']) ? $this->storeslot_settings['tuesday_open_hour_start'] : ''; 
    $tuesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_end']) ? $this->storeslot_settings['tuesday_open_hour_end'] : ''; 

    $wednesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_start']) ? $this->storeslot_settings['wednesday_open_hour_start'] : ''; 
    $wednesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_end']) ? $this->storeslot_settings['wednesday_open_hour_end'] : '';

    $thursday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_start']) ? $this->storeslot_settings['thursday_open_hour_start'] : ''; 
    $thursday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_end']) ? $this->storeslot_settings['thursday_open_hour_end'] : ''; 

    $friday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_start']) ? $this->storeslot_settings['friday_open_hour_start'] : ''; 
    $friday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_end']) ? $this->storeslot_settings['friday_open_hour_end'] : ''; 

?>

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

                            <div class="tab_item" data-target="fee_settings">
                                <h3> <?php _e('Fee Settings', 'storeslots'); ?> </h3>
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
                                                <input id="storeslots_enable_delivery_or_takeaway" class="storeslots_default_checked" name="storeslots_enable_delivery_or_takeaway" type="checkbox" value="yes" <?php echo !empty($this->storeslot_settings) && isset($this->storeslot_settings['storeslots_enable_delivery_or_takeaway']) ? 'checked' : ''; ?>>
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
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_order_type_label" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_order_type_label']) ? $this->storeslot_settings['storeslots_order_type_label'] : ''; ?>" placeholder="">
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
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_delivery_option_label" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_delivery_option_label']) ? $this->storeslot_settings['storeslots_delivery_option_label'] : ''; ?>" placeholder="">
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
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_takeaway_option_label" id="storeslots_takeaway_option_label" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_takeaway_option_label']) ? $this->storeslot_settings['storeslots_takeaway_option_label'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Order type's takeaway delivery option.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Dine-In Option Label', 'store-slots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_dinein_option_label" id="storeslots_dinein_option_label" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_dinein_option_label']) ? $this->storeslot_settings['storeslots_dinein_option_label'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Order type's dine-in delivery option.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Delivery Date & Time  Label', 'store-slots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="storeslots_delivery_date_time_label" id="storeslots_delivery_date_time_label" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_delivery_date_time_label']) ? $this->storeslot_settings['storeslots_delivery_date_time_label'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Delivery Time  Slot Label.</small>
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
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_saturday" value="saturday" <?php echo 'saturday' == $storeslots_saturday? 'checked' : ''; ?>>
                                                <label for="storeslots_saturday">Saturday</label>
                                            </div>
                                            <input class="storeslots_text_control disabled-day h50" type="time" name="saturday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_start']) ? $this->storeslot_settings['saturday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="storeslots_text_control disabled-day storeslots_tt_custom h50" type="time" name="saturday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_end']) ? $this->storeslot_settings['saturday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input type="checkbox" class="storeslots-weak-common"name="storeslots_sunday" value="sunday" <?php echo 'sunday' == $storeslots_sunday? 'checked' : ''; ?>>
                                                <label for="storeslots_sunday">Sunday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="sunday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_start']) ? $this->storeslot_settings['sunday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="sunday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_end']) ? $this->storeslot_settings['sunday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_monday" value="monday" <?php echo 'monday' == $storeslots_monday? 'checked' : ''; ?>>
                                                <label for="storeslots_monday">Monday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="monday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_start']) ? $this->storeslot_settings['monday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="monday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_end']) ? $this->storeslot_settings['monday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_tuesday" value="tuesday" <?php echo 'tuesday' == $storeslots_tuesday? 'checked' : ''; ?>>
                                                <label for="storeslots_tuesday">Tuesday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="tuesday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_start']) ? $this->storeslot_settings['tuesday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="tuesday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_end']) ? $this->storeslot_settings['tuesday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_wednesday" value="wednesday" <?php echo 'wednesday' == $storeslots_wednesday? 'checked' : ''; ?>>
                                                <label for="storeslots_wednesday">Wednesday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="wednesday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_start']) ? $this->storeslot_settings['wednesday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="wednesday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_end']) ? $this->storeslot_settings['wednesday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_thursday" value="thursday" <?php echo 'thursday' == $storeslots_thursday? 'checked' : ''; ?>>
                                                <label for="storeslots_thursday">Thursday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="thursday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_start']) ? $this->storeslot_settings['thursday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="thursday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_end']) ? $this->storeslot_settings['thursday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group2">
                                <div class="label_content2">
                                    <div class="storeslots_input_wrapper">
                                        <div class="storeslots_inputs">
                                            <div style="width: 11%;">
                                                <input class="storeslots-weak-common" type="checkbox" name="storeslots_friday" value="friday" <?php echo 'friday' == $storeslots_friday? 'checked' : ''; ?>>
                                                <label for="storeslots_friday">Friday</label>
                                            </div>
                                            <input class="disabled-day storeslots_text_control h50" type="time" name="friday_open_hour_start" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_start']) ? $this->storeslot_settings['friday_open_hour_start'] : ''; ?>" placeholder="">
                                            <input class="disabled-day storeslots_text_control storeslots_tt_custom h50" type="time" name="friday_open_hour_end" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_end']) ? $this->storeslot_settings['friday_open_hour_end'] : ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Delivery Date -->

                        <!-- Start Fee Settings -->
                        <div data-id="fee_settings" class="storeslots_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Custom Fee Settings', 'storeslots'); ?></h1>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Enable First Order Discount?', 'storeslots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <label class="toggle_switch">
                                                <input id="enable_first_order_discount" class="storeslots_default_checked" name="enable_first_order_discount" type="checkbox" value="yes" <?php echo !empty($this->storeslot_settings) && isset($this->storeslot_settings['enable_first_order_discount']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small class="storeslots-hints">Enable if you want discount for first order.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('First Order Discount Label', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="first_order_discount_label" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['first_order_discount_label']) ? $this->storeslot_settings['first_order_discount_label'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Customer first order discount fee label.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('First Order Discount', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="number" name="first_order_discount" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['first_order_discount']) ? $this->storeslot_settings['first_order_discount'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Customer first order discount in percentage.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Enable Dine-In Extra Fee?', 'storeslots'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <label class="toggle_switch">
                                                <input id="enable_dinein_extra_fee" class="storeslots_default_checked" name="enable_dinein_extra_fee" type="checkbox" value="yes" <?php echo !empty($this->storeslot_settings) && isset($this->storeslot_settings['enable_dinein_extra_fee']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small class="storeslots-hints">Enable if you want extra charge for dine-in type order..</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Dine-In Extra Fee Label', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="text" name="dinein_extra_fee_label" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['dinein_extra_fee_label']) ? $this->storeslot_settings['dinein_extra_fee_label'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Exta charge label for dine-in.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="storeslots_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Dine-In Extra Fee Label', 'storefusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="storeslots_list_items">
                                        <div class="storeslots_item">
                                            <input class="storeslots_text_control h50" type="number" name="dinein_extra_fee" id="" value="<?php echo !empty($this->storeslot_settings) && !empty($this->storeslot_settings['dinein_extra_fee']) ? $this->storeslot_settings['dinein_extra_fee'] : ''; ?>" placeholder="">
                                        </div>
                                        <small class="storeslots-hints">Exta charge for dine-in order in percentage.</small>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- End Fee Settings -->



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