<?php
require 'vendor/autoload.php';

use Aws\Common\Aws;
use Aws\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Aws\Signature\SignatureV4;

$access_key = 'AKIARMTAE6QXH3IJEKVA';
$secret_key = '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';
$url = 'aws/service/global-infrastructure/services/acm';
$region = 'us-west-2';

$credentials = new Credentials($access_key, $secret_key);
var_dump($credentials);

$client = new Client();
$request = new Request('GET', $url);
var_dump($request);

$s4 = new SignatureV4("execute-api", $region);
$s4 = new SignatureV4("execute-api", "us-east-1");
$s4->signRequest($request, $credentials);
var_dump($s4);
var_dump($request);

$response = $client->send($request);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Masterdata</title>
</head>
<body>
	<table>
		<thead>
		<tr>
			<th>File</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
		
			<tr>
				<td></td>
				<td></td>
			</tr>
	</tbody>
	</table>

</body>
