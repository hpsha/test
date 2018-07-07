<?php
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    $user = $CI->session->userdata('userdata');
    if (!isset($user)) { return true; } else { return false; }
}
?>