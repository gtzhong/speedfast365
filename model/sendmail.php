<?php
class Model_SendMail{

	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function send($to,$subject,$body){

		//ykfzt@139.com----dslhzh3tcb

		$sender = "vtbhd@139.com";
		$password = "z74lp4cakg";

		include_once(LIBRARY_PATH . "/PHPMailer/PHPMailerAutoload.php");
		
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.139.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $sender;                 // SMTP username
		$mail->Password = $password;                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		$mail->setFrom($sender, 'Mailer');
		$mail->addAddress($to, $to);     // Add a recipient
		/**
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		**/

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $body;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			return false;
			    //echo 'Message could not be sent.';
			//	echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			  //  echo 'Message has been sent';
			return true;
		}

	}

}
