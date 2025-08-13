<?php
	$curl = curl_init();
	$secret_key = "sk_26055848-9aae-4ee2-90d8-eb263c7bd09c";
	$solution = "..."; // Extract the solution from the request body (_botpoison)
	$data = array("secretKey" => $secret_key, "solution" => $solution);
	$data_string = json_encode($data);
	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.botpoison.com/verify",
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $data_string,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string))
	]);
	$response = curl_exec($curl);
	$error = curl_error($curl);
	
	curl_close($curl);
	
	if ($error) {
		echo "cURL Error #:" . $error;
	} else {
		if (json_decode($response)->ok) {
			echo "Not spam: allow request";
		} else {
			echo "Spam: reject request";
		}
	}  
?>




