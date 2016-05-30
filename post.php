<?php

	$uri = 'http://espritdance.samesamechina.com/webservice/upload';

	$data = file_get_contents('/vagrant/4.mp4');

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$return = curl_exec($ch);
	curl_close($ch);

	var_dump($return);

?>