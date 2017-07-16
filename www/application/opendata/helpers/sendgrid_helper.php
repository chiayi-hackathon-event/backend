<?php

function send_email($to_email, $subject, $message) {
    $CI =& get_instance();

    $CI->load->library('email');
    $CI->email->from('support@gameprice.tw', 'Service');
    $CI->email->to($to_email);
    $CI->email->subject($subject);
    $CI->email->message($message);
    
    return $CI->email->send();
}
