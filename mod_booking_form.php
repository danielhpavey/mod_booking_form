<?php
error_reporting(E_ALL);
ini_set( 'display_errors','1');

include('helper.php');
//Param eg
$excludeddates  = $params->get('xdates');
$email= $params->get('email');
$successpage = $params->get('successpage');

if ( isset( $_POST["name"] ) ){

    $send = new form_submit( $_POST, $email, false);
    $send -> send();
    
    $header = JURI::base() . $successpage;
    header ("Location: $header ");
}

else {

//Layout eg
require JModuleHelper::getLayoutPath('mod_booking_form', $params->get('layout', 'default'));
}

