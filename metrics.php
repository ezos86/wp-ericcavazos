<?php

$username = 'ecavazos'; 	
$password =	'anthony7';

$host = 'https://codenvy.com/api/analytics/metricinfo';

$process = curl_init($host);
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($process, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);

echo $return;

?>
