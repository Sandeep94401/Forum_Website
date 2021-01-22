<?php
echo "sandeep";
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require 'textlocal.class.php';
   class Controller
{

   function __construct(){
    $this->processmobileVerification();
}
    function processmobileVerification()
{

    switch($_POST["action"])
{
        case "send_otp":
            $mobile_number =$_POST['mobile_number'];
            $apiKey = urlencode('o2WvudQYayk-ZFbi80UMiJU4DfnAlLApZvkoAhX64Y');
            $Textlocal = new Textlocal(false,false,$apikey);
            $numbers = array(
                $mobile_number
            );
            $sender='TXTLCL';
            $otp=rand(100000,999999);
            $_SESSION['session_otp']=$otp;
            $message="your one time password is" . $otp;

            try{
            $response = $Textlocal->sendSms($numbers,$message,$sender);
            require_once("verification-form.php");
            exit();
            }
               catch(Exception $e){
            die('Error' .$e->getMessage());
               }
     break;
 
     case "verify_otp":
      $otp=$_POST['otp'];
      if($otp == $_SESSION['session_otp'])
    {
        unset($_SESSION['session_otp']);
     echo json_encode(array("type"=>"success","message"=>"your mobile number is verified"));
    }
     else
{
     echo json_encode(array("type"=>"error","message"=>"your mobile number verification failed"));
}            
    break;
}


}

}

$controller=new Controller();
?>