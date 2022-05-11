<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('StoreSlotsFrontend')) {
    class StoreSlotsFrontend {

        public $utils;
        public $storeslot_settings = array();
          
        public function __construct (){
            $this->utils = new StoreSlotsUtils();
            
            new StoreSlotsFrontendAjax($this);
            add_action ('wp_enqueue_scripts', array($this, 'store_slots_frontend_enqueue'));
            add_action('woocommerce_after_order_notes', array($this, 'storeslots_add_custom_field'));
            add_action('woocommerce_checkout_process', array($this, 'storeslots_checkout_field_process'));
            add_action('woocommerce_checkout_update_order_meta', array( $this,'storeslots_checkout_field_update_order_meta'));

            $this->storeslot_settings = get_option('storeslot_settings', false);

        }

        public function store_slots_frontend_enqueue ($page) {
            $this->utils->enqueue_style('frontend', 'frontend.css');
            $this->utils->enqueue_script('frontend', 'frontend.js', array('jquery'));
        }

        public function storeslots_add_custom_field($checkout){
            echo '<div id="storeslots_custom_checkout_field">';

            woocommerce_form_field(
                'storeslots_ordertype_selection_box',
                array(
                    'type' => 'select',
                    'class' => array(
                        'storeslots_ordertype_selection_box'
                    ),
                    'label' => __('Order Type'),
                    'placeholder' => __('Order Type'),
                    
                    'options' => array(
                         '' => __('Choose Order type'),
                        'delivery' => __('Delivery'),
                        'pickup' => __('Pickup')
                    ),

                    'required' => true,
                ),
                $checkout->get_value('storeslots_ordertype_selection_box')
            );

            echo '</div>';

           
            // Schedule Date and Time
            $storeslots_schedules = array();
            $storeslots_sunday_time = '';
            $storeslots_saturday_time = '';
            $storeslots_monday_time = '';
            $storeslots_tuesday_time = '';
            $storeslots_wednesday_time = '';
            $storeslots_thursday_time = '';
            $storeslots_friday_time = '';
            $storeslots_schedules[]= 'Select Time Slot';

            $storeslots_saturday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_saturday']) ? $this->storeslot_settings['storeslots_saturday'] : ''; 
            $saturday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_start']) ? $this->storeslot_settings['saturday_open_hour_start'] : ''; 
            $saturday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_end']) ? $this->storeslot_settings['saturday_open_hour_end'] : ''; 

            if( !empty( $storeslots_saturday )){
                if( !empty( $saturday_open_hour_start ) && !empty(  $saturday_open_hour_end )  ){
                    $storeslots_saturday_time =  '--> ' . $saturday_open_hour_start . ' - ' . $saturday_open_hour_end;
                }
                
                $store_slot_one = ucfirst( $storeslots_saturday )  . $storeslots_saturday_time;

                $storeslots_schedules[$store_slot_one] =  $store_slot_one ; 
            }

            $storeslots_sunday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_sunday']) ? $this->storeslot_settings['storeslots_sunday'] : ''; 
            $sunday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_start']) ? $this->storeslot_settings['sunday_open_hour_start'] : ''; 
            $sunday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_end']) ? $this->storeslot_settings['sunday_open_hour_end'] : ''; 

            if( !empty( $storeslots_sunday )){
                if( !empty( $sunday_open_hour_start ) && !empty(  $sunday_open_hour_end )  ){
                    $storeslots_sunday_time =  '--> ' . $sunday_open_hour_start . ' - ' . $sunday_open_hour_end;
                }
                $store_slot_two = ucfirst( $storeslots_sunday )  . $storeslots_sunday_time;

                $storeslots_schedules[$store_slot_two] = $store_slot_two ; 
            }

            $storeslots_monday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_monday']) ? $this->storeslot_settings['storeslots_monday'] : ''; 
            $monday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_start']) ? $this->storeslot_settings['monday_open_hour_start'] : ''; 
            $monday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_end']) ? $this->storeslot_settings['monday_open_hour_end'] : ''; 

            if( !empty( $storeslots_monday )){
                if( !empty( $monday_open_hour_start ) && !empty(  $monday_open_hour_end )  ){
                    $storeslots_monday_time =  '--> ' . $monday_open_hour_start . ' - ' . $monday_open_hour_end;
                }
                $store_slot_three = ucfirst( $storeslots_monday )  . $storeslots_monday_time;

                $storeslots_schedules[$store_slot_three] = $store_slot_three; 
            }

            $storeslots_tuesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_tuesday']) ? $this->storeslot_settings['storeslots_tuesday'] : ''; 
            $tuesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_start']) ? $this->storeslot_settings['tuesday_open_hour_start'] : ''; 
            $tuesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_end']) ? $this->storeslot_settings['tuesday_open_hour_end'] : ''; 

            if( !empty( $storeslots_tuesday )){
                if( !empty( $tuesday_open_hour_start ) && !empty(  $tuesday_open_hour_end )  ){
                    $storeslots_tuesday_time =  '--> ' . $tuesday_open_hour_start . ' - ' . $tuesday_open_hour_end;
                }

                $store_slot_four = ucfirst( $storeslots_tuesday )  . $storeslots_tuesday_time;
                $storeslots_schedules[$store_slot_four] = $store_slot_four; 
            }

            $storeslots_wednesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_wednesday']) ? $this->storeslot_settings['storeslots_wednesday'] : ''; 
            $wednesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_start']) ? $this->storeslot_settings['wednesday_open_hour_start'] : ''; 
            $wednesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_end']) ? $this->storeslot_settings['wednesday_open_hour_end'] : ''; 

            if( !empty( $storeslots_wednesday )){
                if( !empty( $wednesday_open_hour_start ) && !empty(  $wednesday_open_hour_end )  ){
                    $storeslots_wednesday_time =  '--> ' . $wednesday_open_hour_start . ' - ' . $wednesday_open_hour_end;
                }

                $store_slot_five = ucfirst( $storeslots_wednesday )  . $storeslots_wednesday_time;

                $storeslots_schedules[$store_slot_five] =  $store_slot_five; 
            }

            $storeslots_thursday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_thursday']) ? $this->storeslot_settings['storeslots_thursday'] : ''; 
            $thursday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_start']) ? $this->storeslot_settings['thursday_open_hour_start'] : ''; 
            $thursday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_end']) ? $this->storeslot_settings['thursday_open_hour_end'] : ''; 

            if( !empty( $storeslots_thursday )){
                if( !empty( $thursday_open_hour_start ) && !empty(  $thursday_open_hour_end )  ){
                    $storeslots_thursday_time =  '--> ' . $thursday_open_hour_start . ' - ' . $thursday_open_hour_end;
                }
                $store_slot_six = ucfirst( $storeslots_thursday )  . $storeslots_thursday_time;
                $storeslots_schedules[$store_slot_six] = $store_slot_six;
            }

            $storeslots_friday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_friday']) ? $this->storeslot_settings['storeslots_friday'] : ''; 
            $friday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_start']) ? $this->storeslot_settings['friday_open_hour_start'] : ''; 
            $friday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_end']) ? $this->storeslot_settings['friday_open_hour_end'] : ''; 

            if( !empty( $storeslots_friday )){
                if( !empty( $friday_open_hour_start ) && !empty(  $friday_open_hour_end )  ){
                    $storeslots_friday_time =  '--> ' . $friday_open_hour_start . ' - ' . $friday_open_hour_end;
                }
                $store_slot_seven = ucfirst( $storeslots_friday )  . $storeslots_friday_time; 
                $storeslots_schedules[ $store_slot_seven] =  $store_slot_seven;
            }

        echo '<div id="storeslots_custom_checkout_schedule">';
            woocommerce_form_field(
                'storeslots_order_schedule',
                array(
                    'type' => 'select',
                    'class' => array(
                        'storeslots_order_schedule'
                    ),
                    'label' => __('Delivery Date & Time'),
                    'placeholder' => __('Delivery Date & Time'),
                    
                    'options' => $storeslots_schedules,

                    'required' => true,
                ),
                $checkout->get_value('storeslots_order_schedule')
            );

            echo '</div>';
        }

        public function storeslots_checkout_field_process(){
            // Show an error message if the field is not set.
            if (!$_POST['storeslots_ordertype_selection_box']) wc_add_notice(__('Please enter value!'), 'error');
            if (!$_POST['storeslots_order_schedule']) wc_add_notice(__('Please enter value!'), 'error');
        }

        public function storeslots_checkout_field_update_order_meta( $order_id ){
            $order_type_val = '';
            if (!empty($_POST['storeslots_ordertype_selection_box'])) {
                $order_type_val = $_POST['storeslots_ordertype_selection_box'];

                update_post_meta($order_id, 'delivery_type', sanitize_text_field($_POST['storeslots_ordertype_selection_box']));
            }

            if (!empty($_POST['storeslots_order_schedule'])) {

                update_post_meta($order_id, $order_type_val .'_date_time', sanitize_text_field($_POST['storeslots_order_schedule']));
            }


        }

       

    }
}

new StoreSlotsFrontend();
