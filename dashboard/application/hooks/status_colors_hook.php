<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function load_status_colors() {
    $CI =& get_instance();
    $CI->load->helper('app_helper'); // Load the custom helper
    // $this->load->helper('app_helper');
    // Generate status colors and make it available to all views
    $CI->load->vars('statusColors', generateStatusColors());
}
