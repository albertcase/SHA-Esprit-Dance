# UPLOAD FILE API
---

API URL: http://espritdance.samesamechina.com/webservice/upload

HTTP Methods: POST

DATA:

	{
		RAWDATA
	}	Return JSON:	{
		success : 1
		msg: success	}
	
error code: 	{
		success : 0		error_code: ERROR CODE, see Common ERROR Code
		error_msg: ERROR MSG, see Common ERROR Code	}

### Common ERROR Code 

####error_code:

11: post data is empty

12: failed to create file


### PHP CURL DEMO：

	$uri = 'http://espritdance.samesamechina.com/webservice/upload';
	$data = file_get_contents('/vagrant/test.mp4');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$return = curl_exec($ch);
	curl_close($ch);

