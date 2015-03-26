<?php

class form_submit{

        function __construct( $postdata, $mail, $message ){
            $this -> post = $postdata;
            $this -> recipient = $mail;
            $this -> message = $message;
        }
    
        function send(){

        $mailer = JFactory::getMailer();
        $config = JFactory::getConfig();
        $jversion = new JVersion();

        if ( isset($this -> sender )){
            $senderaddress = $this -> post[$this -> sender];
            $sender = array( $senderaddress, $senderaddress );
        } else {

            if ( $jversion->RELEASE > 3 ){
                $sender = array( 
                $config->get( 'config.mailfrom' ),
                $config->get( 'config.fromname' ) );
            
            } else {
                $sender = array( 
                $config->getValue( 'config.mailfrom' ),
                $config->getValue( 'config.fromname' ) );
            }
        }

        $mailer->setSender($sender);

        $mailer->addRecipient($this -> recipient);

        $mailer->setSubject('Booking Enquiry');

        $body = '';
        $postexcludearray = array( 'action', 'view', 'option' ,'submit');
        foreach( $this -> post as $key=>$data ){
            !in_array($key, $postexcludearray) ? $body .= str_replace('_', ' ', ucwords($key)) . ': ' . htmlentities($data) . '<br />' : '';
        }
        
        $mailer->setBody(nl2br(str_replace('\\', '', $body)));

        $mailer->isHTML(true);
        $mailer->Encoding='8bit';

        $send = $mailer->Send();
        if ( $send !== true ) {
            $result =  'Error sending email: ' . $send->get('message');
        } else {
            $result = htmlentities($this -> message);
        }

            $this -> mailsendresult = $result;  
 }

}
