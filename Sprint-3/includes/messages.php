<?php
    // Admin Registration Page...
    $final_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
    $final_success = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
    
    // Admin Registration Page...
    unset($_SESSION['error_message']);
    unset($_SESSION['success_message']);
?>