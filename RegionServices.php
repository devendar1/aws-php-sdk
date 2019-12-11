<?php

require "vendor/autoload.php";
use Aws\Pricing\PricingClient;


$client= new Aws\Pricing\PricingClient([
    'region' => 'us-east-1',//ap-south-1
    'version' => 'latest',
    'profile' => 'default'   
]);
// var_dump($client);
// exit();
$result = $client->describeServices();

// $result = $client->describeServices([
//     'FormatVersion' => 'aws_v1',
//     'MaxResults' => 1,
//     'ServiceCode' => 'AmazonEC2',
// ]);

//  var_dump($result["Services"][0]);
echo '<h1>'. 'ServiceCode'.'</h1>';
foreach($result["Services"] as $service)
 {
    echo $service["ServiceCode"] .'<br/>'."\n";
 }
// exit();

// $resultProduct = $client->getProducts([
//     'Filters' => [
//         [
//             'Field' => 'ServiceCode',
//             'Type' => 'TERM_MATCH',
//             'Value' => 'AmazonEC2',
//         ]
//     ],
//     'FormatVersion' => 'aws_v1',
//     'MaxResults' => 1,
// ]);

//     var_dump($resultProduct);
//     exit();

?>
