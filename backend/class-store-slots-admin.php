<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('StoreSlotsAdmin')) {
    class StoreSlotsAdmin {


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


    }
}


new StoreSlotsAdmin();
