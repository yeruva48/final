<?php
require_once "mailer/PHPMailerAutoload.php";
$mail = new PHPMailer;
$name= $_POST['cname'];
$email = $_POST['email'];
$message = $_POST['msg'];
$phone = $_POST['mobno'];

  // $mail->SMTPDebug = 2;                                       
  $mail->isSMTP();                                            
  $mail->Host       = 'smtp.gmail.com;';                    
  $mail->SMTPAuth   = true;                             
  $mail->Username   = 'revanthreddy444@gmail.com';                 
  $mail->Password   = 'Katres@6';                        
  $mail->SMTPSecure = 'tls';                              
  $mail->Port       = 587;  

  $mail->setFrom('from@gmail.com', 'Fitness club');           
  $mail->addAddress($email);
  $mail->addAddress($email, $name);
     
  $mail->isHTML(true);                                  
  $mail->Subject = 'Customer Enquiry';
  $mail->Body    = "Name : $name , <br> Email : $email,<br> Mobile : $phone,<br> Message : $message";
  
  if($mail->send()){
    $status = "success";
    $response = "Thank you for contacting us.";
  }
  else
  {
      $status = "failed";
      $response = "Something is wrong: <br>" . $mail->ErrorInfo;
  }
  exit(json_encode(array("status" => $status, "response" => $response)));
?>