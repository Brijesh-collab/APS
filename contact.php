<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
// $type= $_POST['Roomtype'];
$name = $_POST['name'];
// $checkin = $_POST['checkin'];
// $checkout = $_POST['checkout'];
// $adult = $_POST['adults'];
// $child = $_POST['childs'];
$visitor_email = $_POST['email'];
// if(empty($subject)){
//   $subject = "NA"
// }
// else{
//   $subject = $_POST['subject'];
// }
$subject = $_POST['subject'];

$message = $_POST['message'];
// $no = $_POST['phone'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

//if(IsInjected($visitor_email))
//{
//    echo "Bad email value!";
//    exit;
//}

$email_from = $visitor_email;//<== update the email address Mobile No: $no. \n
$email_subject = "Inquiry";
$email_body = "You have new client approach! \n Name: \"$name.\" \n  Subject to inquiry: $subject. \n Message: $message \n".
    
$to = "info@aarambhpublicschool.com,brijeshchauhan.work@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
//$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
// header('Location: thankyou.html');
echo "<h4>We will contact you soon!!</h4>";


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?>