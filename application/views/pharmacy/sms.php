<center>

<?php
       
if(isset($_POST['submit'])){   
$curl = curl_init();
$mobile=$_POST['mobile'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=Lgncx0DYQXl5T8K2UtAWPsMFiZmOkBbjEzhy7GCSofRwe6apNulVbZtEzUIx7N6SCuQXcvpnMLyaKAo5&sender_id=FSTSMA&message=".urlencode('This is a test message')."&language=english&route=p&numbers=".urlencode($mobile)."&flash=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
?>
<br>
<br>
<br>
<h1>Send Sms With Php(codeigniter)</h1>
<form action="" method="post">




<input type="text" name="mobile" placeholder="Mobile"><br><br>


<input type="submit" name="submit" value="submit"/>



</form>


</center>