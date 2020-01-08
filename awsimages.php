<?php

require 'vendor/autoload.php';
use Aws\Ec2\Ec2Client;

// $ec2Client = new Aws\Ec2\Ec2Client([
//     'region' => 'ap-south-1',
//     'version' => 'latest',
//     'profile' => 'default'   
// ]);

$client= new Aws\Pricing\PricingClient([
    'region' => 'us-east-1',//ap-south-1
    'version' => 'latest',
    'profile' => 'default'   
]);
$result = $client->describeServices();

// var_dump($result["Services"][0]["ServiceCode"]);
// exit();

$url = 'https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/index.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

// var_dump($response["offers"][$result["Services"][0]["ServiceCode"]] );
// exit();
$size = count($response["offers"]);

// echo $size;
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
			<th>S.no</th>
			<th>ServiceCode</th>
			<th>versionIndexUrl</th>
			<th>currentVersionUrl</th>
			<th>currentRegionIndexUrl</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			
		  	<?php for($i=0;$i<100; $i++):?><tr>
				<td> <?php if (isset($i)) echo $i+1;?></td>
		 	<?php foreach($response["offers"][$result["Services"][$i]["ServiceCode"]] as $responses): 
	  		// var_dump($responses); exit();?>
				<td><?php if(isset($response["offers"][$responses]["offerCode"])) 				echo $response["offers"][$responses]["offerCode"] ; ?></td>
				<td><?php  if(isset($response["offers"][$responses]["versionIndexUrl"])) 		echo $response["offers"][$responses]["versionIndexUrl"]; ?></td>
				<td><?php  if(isset($response["offers"][$responses]["currentVersionUrl"])) 		echo $response["offers"][$responses]["currentVersionUrl"]; ?></td>
				<td><?php  if(isset($response["offers"][$responses]["currentRegionIndexUrl"]))  echo $response["offers"][$responses]["currentRegionIndexUrl"]; ?></td>
				</tr>
		  <?php endforeach; ?>		 
		  <?php endfor;?>
		
	</tbody>
	</table>
</body>
