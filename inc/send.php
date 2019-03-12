<?php
$firstname = $_POST["firstName"];
$lastname = $_POST["lastName"];
$email = $_POST["emailAddress"];
$message = $_POST["message"] . "<br>Sent by: " . $email;
$special = $_POST["subject"];

$to = "katie@kosaya.com";
$subject = "New Kosaya Photography inquiry from " . $firstname . " " . $lastname;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
$headers .= 'Reply-To: ' . $email;

if ( trim($special) == "" ) {
  
  $success = mail( $to, $subject, nl2br($message), $headers );
  if ( $success ) {
    $response = array( "success" => true, "message" => "Thank you for contacting me!" );
  } else {
    $response = array( "success" => false, "message" => "Sorry, something went wrong and your message was not sent.  Please contact me at <a href='mailto:katie@kosaya.com'>katie@kosaya.com</a>.  Thank you!" );
  }
  $response = json_encode( $response );
  echo $response;
  
} else {
  
  $response = array( "success" => false, "message" => "Sorry, something went wrong and your message was not sent.  Please contact me at <a href='mailto:katie@kosaya.com'>katie@kosaya.com</a>.  Thank you!" );
  $response = json_encode( $response );
  echo $response;
  die();

}
?>