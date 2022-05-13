<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('StoreSlotsAdmin')) {
    class StoreSlotsAdmin
    {

        public $utils;
        public $db;
        public $storeslot_settings = array();

        public function __construct()
        {
            $this->utils = new StoreSlotsUtils();

            add_action("admin_menu", array($this, 'store_slots_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'store_slots_admin_enqueue'));
            add_action('plugin_action_links_' . STORESLOTS_BASE_PATH, array($this, 'store_slots_action_links'));
            $this->db = new StoreSlotsDB($this);
            new StoreSlotsAdminAjax($this);
            $this->storeslot_settings = get_option('storeslot_settings', false);

            add_action('add_meta_boxes', [$this, 'order_meta_boxes']);
            add_action('save_post', [$this, 'save_order_meta_boxes'], 10, 2);

            $enable_dinein_extra_fee = !empty($this->storeslot_settings) && isset($this->storeslot_settings['enable_dinein_extra_fee']) ? 'yes' : 'no'; 

            if( 'yes' == $enable_dinein_extra_fee ){
                add_action('woocommerce_order_after_calculate_totals', [$this, 'storeslot_dinein_fee'], 10, 2);
            }
            
        }


        public function store_slots_action_links($links)
        {
            $settings_url = add_query_arg('page', 'storeslots', get_admin_url() . 'admin.php');
            $setting_arr = array('<a href="' . esc_url($settings_url) . '">Dashboard</a>');
            $links = array_merge($setting_arr, $links);
            return $links;
        }

        public function store_slots_admin_menu()
        {
            $icon_url = STORESLOTS_IMG_DIR . "storeslots_icon.svg";
            add_menu_page("StoreSlots", "StoreSlots", 'manage_options', "storeslots", array($this, 'storeslots_admin_dashboard'), $icon_url, 6);
        }

        public function store_slots_admin_enqueue($page)
        {
            if ($page == "toplevel_page_storeslots") {
                $this->utils->enqueue_style('select2', 'select2.min.css');
                $this->utils->enqueue_style('toastr', 'toastr.min.css');
                $this->utils->enqueue_style('admin', 'admin.css');

                $this->utils->enqueue_script('select2', 'select2.min.js', array('jquery'));
                $this->utils->enqueue_script('toastr', 'toastr.min.js', array('jquery'));
                $this->utils->enqueue_script('admin', 'admin.js', array('jquery'));
            }
        }


        public function storeslots_admin_dashboard()
        {
            include_once STORESLOTS_PATH . "backend/templates/dashboard.php";
        }

        public function order_meta_boxes($post_type)
        {
            add_meta_box(
                'storeslot_metabox',
                __('Delivery Date & Time', 'store-slots'),
                [$this, 'storeslot_meta_box_markup'],
                'shop_order',
                'advanced',
                'high',
                null
            );
        }

        public function storeslot_meta_box_markup($post)
        {
            wp_nonce_field('storeslot_metabox', 'storeslot_metabox_nonce');

            $delivery_type = get_post_meta($post->ID, 'delivery_type', true);
            $delivery_schedule = get_post_meta($post->ID, 'delivery_schedule', true);

            // Schedule Date and Time
            $storeslots_schedules = array();
            $storeslots_sunday_time = '';
            $storeslots_saturday_time = '';
            $storeslots_monday_time = '';
            $storeslots_tuesday_time = '';
            $storeslots_wednesday_time = '';
            $storeslots_thursday_time = '';
            $storeslots_friday_time = '';
            $storeslots_schedules[] = 'Select Time Slot';

            $storeslots_saturday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_saturday']) ? $this->storeslot_settings['storeslots_saturday'] : '';
            $saturday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_start']) ? $this->storeslot_settings['saturday_open_hour_start'] : '';
            $saturday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['saturday_open_hour_end']) ? $this->storeslot_settings['saturday_open_hour_end'] : '';

            if (!empty($storeslots_saturday)) {
                if (!empty($saturday_open_hour_start) && !empty($saturday_open_hour_end)) {
                    $storeslots_saturday_time =  ' ⇢ ' . $saturday_open_hour_start . ' - ' . $saturday_open_hour_end;
                }

                $store_slot_one = ucfirst($storeslots_saturday)  . $storeslots_saturday_time;

                $storeslots_schedules[$store_slot_one] =  $store_slot_one;
            }

            $storeslots_sunday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_sunday']) ? $this->storeslot_settings['storeslots_sunday'] : '';
            $sunday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_start']) ? $this->storeslot_settings['sunday_open_hour_start'] : '';
            $sunday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['sunday_open_hour_end']) ? $this->storeslot_settings['sunday_open_hour_end'] : '';

            if (!empty($storeslots_sunday)) {
                if (!empty($sunday_open_hour_start) && !empty($sunday_open_hour_end)) {
                    $storeslots_sunday_time =  ' ⇢ ' . $sunday_open_hour_start . ' - ' . $sunday_open_hour_end;
                }
                $store_slot_two = ucfirst($storeslots_sunday)  . $storeslots_sunday_time;

                $storeslots_schedules[$store_slot_two] = $store_slot_two;
            }

            $storeslots_monday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_monday']) ? $this->storeslot_settings['storeslots_monday'] : '';
            $monday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_start']) ? $this->storeslot_settings['monday_open_hour_start'] : '';
            $monday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['monday_open_hour_end']) ? $this->storeslot_settings['monday_open_hour_end'] : '';

            if (!empty($storeslots_monday)) {
                if (!empty($monday_open_hour_start) && !empty($monday_open_hour_end)) {
                    $storeslots_monday_time =  ' ⇢ ' . $monday_open_hour_start . ' - ' . $monday_open_hour_end;
                }
                $store_slot_three = ucfirst($storeslots_monday)  . $storeslots_monday_time;

                $storeslots_schedules[$store_slot_three] = $store_slot_three;
            }

            $storeslots_tuesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_tuesday']) ? $this->storeslot_settings['storeslots_tuesday'] : '';
            $tuesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_start']) ? $this->storeslot_settings['tuesday_open_hour_start'] : '';
            $tuesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['tuesday_open_hour_end']) ? $this->storeslot_settings['tuesday_open_hour_end'] : '';

            if (!empty($storeslots_tuesday)) {
                if (!empty($tuesday_open_hour_start) && !empty($tuesday_open_hour_end)) {
                    $storeslots_tuesday_time =  ' ⇢ ' . $tuesday_open_hour_start . ' - ' . $tuesday_open_hour_end;
                }

                $store_slot_four = ucfirst($storeslots_tuesday)  . $storeslots_tuesday_time;
                $storeslots_schedules[$store_slot_four] = $store_slot_four;
            }

            $storeslots_wednesday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_wednesday']) ? $this->storeslot_settings['storeslots_wednesday'] : '';
            $wednesday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_start']) ? $this->storeslot_settings['wednesday_open_hour_start'] : '';
            $wednesday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['wednesday_open_hour_end']) ? $this->storeslot_settings['wednesday_open_hour_end'] : '';

            if (!empty($storeslots_wednesday)) {
                if (!empty($wednesday_open_hour_start) && !empty($wednesday_open_hour_end)) {
                    $storeslots_wednesday_time =  ' ⇢ ' . $wednesday_open_hour_start . ' - ' . $wednesday_open_hour_end;
                }

                $store_slot_five = ucfirst($storeslots_wednesday)  . $storeslots_wednesday_time;

                $storeslots_schedules[$store_slot_five] =  $store_slot_five;
            }

            $storeslots_thursday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_thursday']) ? $this->storeslot_settings['storeslots_thursday'] : '';
            $thursday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_start']) ? $this->storeslot_settings['thursday_open_hour_start'] : '';
            $thursday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['thursday_open_hour_end']) ? $this->storeslot_settings['thursday_open_hour_end'] : '';

            if (!empty($storeslots_thursday)) {
                if (!empty($thursday_open_hour_start) && !empty($thursday_open_hour_end)) {
                    $storeslots_thursday_time =  ' ⇢ ' . $thursday_open_hour_start . ' - ' . $thursday_open_hour_end;
                }
                $store_slot_six = ucfirst($storeslots_thursday)  . $storeslots_thursday_time;
                $storeslots_schedules[$store_slot_six] = $store_slot_six;
            }

            $storeslots_friday  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_friday']) ? $this->storeslot_settings['storeslots_friday'] : '';
            $friday_open_hour_start  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_start']) ? $this->storeslot_settings['friday_open_hour_start'] : '';
            $friday_open_hour_end  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['friday_open_hour_end']) ? $this->storeslot_settings['friday_open_hour_end'] : '';

            if (!empty($storeslots_friday)) {
                if (!empty($friday_open_hour_start) && !empty($friday_open_hour_end)) {
                    $storeslots_friday_time =  ' ⇢ ' . $friday_open_hour_start . ' - ' . $friday_open_hour_end;
                }
                $store_slot_seven = ucfirst($storeslots_friday)  . $storeslots_friday_time;
                $storeslots_schedules[$store_slot_seven] =  $store_slot_seven;
            }

            $delivery_option_label  = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_delivery_option_label']) ? $this->storeslot_settings['storeslots_delivery_option_label'] : 'Delivery';

            $takeaway_option_label = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_takeaway_option_label']) ? $this->storeslot_settings['storeslots_takeaway_option_label'] : 'Takeaway';

            $dinein_option_label = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['storeslots_dinein_option_label']) ? $this->storeslot_settings['storeslots_dinein_option_label'] : 'Dine-In';


            ?>
            <div class="storeslot-wrapper">
                <select class="storeslots_ordertype_selection_box" name="storeslots_ordertype_selection_box" id="storeslots_ordertype_frontend_box" style="width:100%;">
                    <option value="delivery" <?php echo 'delivery' == $delivery_type ? 'selected' : '';  ?>> <?php echo $delivery_option_label; ?></option>
                    <option value="takeaway" <?php echo 'takeaway' == $delivery_type ? 'selected' : '';  ?>><?php echo $takeaway_option_label; ?></option>
                    <option value="dine_in" <?php echo 'dine_in' == $delivery_type ? 'selected' : '';  ?>> <?php  echo  $dinein_option_label; ?> </option>
                </select>

                <select class="storeslots_order_schedule" name="storeslots_order_schedule" id="storeslots_order_schedule" style="width:100%; margin-top:15px">
                    <?php foreach ($storeslots_schedules as $storeslots_schedule) : ?>
                        <option value="<?php echo $storeslots_schedule; ?>" <?php echo $delivery_schedule ==  $storeslots_schedule ? 'selected' : ''; ?>> <?php echo $storeslots_schedule; ?> </option>
                    <?php endforeach; ?>
                </select>

            </div>
            <?php
        }

        public function save_order_meta_boxes($post_id)
        {
            if (!isset($_POST['storeslot_metabox_nonce'])) {
                return $post_id;
            }

            $nonce = $_POST['storeslot_metabox_nonce'];

            if (!wp_verify_nonce($nonce, 'storeslot_metabox')) {
                return $post_id;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            if (isset($_POST['storeslots_ordertype_selection_box'])) {
                update_post_meta($post_id, 'delivery_type', $_POST['storeslots_ordertype_selection_box']);
            }

            if (isset($_POST['storeslots_order_schedule'])) {
                update_post_meta($post_id, 'delivery_schedule', $_POST['storeslots_order_schedule']);
            }
        }

        public function storeslot_dinein_fee($and_taxes, $order)
        {
            $order_type = '';

            if (isset($_POST['storeslots_ordertype_selection_box'])) {
                 $order_type = $_POST['storeslots_ordertype_selection_box'];
            }

            if( $order_type != 'dine_in'){
                return;
            }


            if (did_action('woocommerce_order_after_calculate_totals') >= 2)
                return;

            $dinein_extra_fee_label = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['dinein_extra_fee_label']) ? $this->storeslot_settings['dinein_extra_fee_label'] : 'Dine-In Service Charge';

            $dinein_extra_fee = !empty($this->storeslot_settings) && !empty($this->storeslot_settings['dinein_extra_fee']) ? $this->storeslot_settings['dinein_extra_fee'] : 10;

            $percentage = $dinein_extra_fee / 100; // Fee percentage

            $fee_data   = array(
                'name'       => __($dinein_extra_fee_label),
                'amount'     => wc_format_decimal($order->get_total() * $percentage),
                'tax_status' => 'none',
                'tax_class'  => ''
            );

            $fee_items  = $order->get_fees(); // Get fees

            // Add fee
            if (empty($fee_items)) {
                $item = new WC_Order_Item_Fee(); // Get an empty instance object

                $item->set_name($fee_data['name']);
                $item->set_amount($fee_data['amount']);
                $item->set_tax_class($fee_data['tax_class']);
                $item->set_tax_status($fee_data['tax_status']);
                $item->set_total($fee_data['amount']);

                $order->add_item($item);
                $item->save(); // (optional) to be sure
            }
            // Update fee
            else {
                foreach ($fee_items as $item_id => $item) {
                    if ($item->get_name() === $fee_data['name']) {
                        $item->set_amount($fee_data['amount']);
                        $item->set_tax_class($fee_data['tax_class']);
                        $item->set_tax_status($fee_data['tax_status']);
                        $item->set_total($fee_data['amount']);
                        $item->save();
                    }
                }
            }
        }
    }
}


new StoreSlotsAdmin();
