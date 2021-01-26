<?php
$from_mail = 'system@plasindo.loc';
$to = 'pratama@plasindo.loc';

$subject = 'MAIL System';
$message = <<<AKAM
BODY message on send.<br>
<span style="color:#f00;font-weight:bold;">Ini email dari system</span>
AKAM;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: Your Name <'.$to.'>' . "\r\n";
$headers .= 'From: NO-REPLY <'.$from_mail.'>' . "\r\n";

$sendtomail = mail($to, $subject, $message, $headers);
if( $sendtomail ) echo 'Success';
else echo 'Failed';
?> 
