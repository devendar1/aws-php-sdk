<?php

require 'vendor/autoload.php';
use Aws\Ec2\Ec2Client;

$ec2Client = new Aws\Ec2\Ec2Client([
    'region' => 'ap-south-1',
    'version' => 'latest',
    'profile' => 'default'   
]);
// var_dump($ec2Client);

$result = $ec2Client ->describeImages([
        'Filters' => [
        [
            'platform' => 'SUSE Linux',
            'architectures'=> 'arm64'
        ],
    ],

]);

$url = 'https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/index.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);



var_dump($response);
exit();

?>