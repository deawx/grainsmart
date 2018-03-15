<?php
/*Setup PHPMailer*/
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$emailBody = '<div><p>Hi '.$first_name . ',</p><p>Copy this activation code for email verication: <strong>' .$activation_code.'</strong></p><br><p>Best regards,</p><p>Grainsmart Cainta</p></div>';

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($email);
$mail->Subject = "Email Verification";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);