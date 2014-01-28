<?php
//session_start();
//require_once('../config.php');

$username = $_POST['username']; 	
$password =	$_POST['password'];
$id = $_POST['id'];
$location_id = $_POST['location_id'];
$dateFrom = urldecode($_POST['dateFrom']);
$dateTo = urldecode($_POST['dateTo']);

$dateFrom = strtotime($dateFrom);
$dateTo = strtotime($dateTo);

//$host = 'https://reports.qpme.com/reports/transactional/0/'.$location_id.'/'.$dateFrom.'/'.$dateTo.'/1/0';

$username = 'chris@douglasparking.com';
$password = 'park80Grand';

//$host = 'https://reports.qpme.com/reports/transactional/0/41/1372636800/1380499200/1/0';
$host = 'https://reports.qpme.com/reports/transactional/0/0/1385930534/1388522534/1/0';

$process = curl_init($host);
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($process, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);

echo $return;

//echo $host;

?>
