<?php
	// The global $_POST variable allows you to access the data sent with the POST method by name
	// To access the data sent with the GET method, you can use $_GET
	
	$say = htmlspecialchars($_POST['say']);
	$to  = htmlspecialchars($_POST['to']);
	
	echo  $say, ' ', $to;
  
	$data = array(
				'secret' => "ES_a7ddbabbaf7d421ab7a03625b818f75f",
				'response' => $_POST['h-captcha-response']
			);
			
			
	// hCaptcha verification
	
	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);
	// var_dump($response);
	$responseData = json_decode($response);
	if($responseData->success) {
		// your success code goes here
	} 
	else {
	   // return error to user; they did not pass
	}
?>