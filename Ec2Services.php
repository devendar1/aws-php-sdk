<?php

require 'vendor/autoload.php';

$url = 'https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/ap-east-1/index.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
foreach ($response["terms"] as $offer)
	var_dump($offer["D5QHGH2W5YYY8YWA"] ["D5QHGH2W5YYY8YWA.JRTCKXETXF"]);
exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Ec2Servicedata</title>
</head>

<body>
	<table>
		<thead>
			<tr>
				<th>S.no</th>
				<th>SKU</th>
				<th>productFamily</th>
				<th>servicecode</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($response["products"] as $offer) : ?>
				<tr>
					<td><?php echo $i; ?>
					<td><?php echo $offer["sku"]; ?></td>
					<td><?php echo $offer["productFamily"]; ?></td>
					<td><?php if (array_key_exists("clockSpeed", $offer["attributes"])) echo $offer["attributes"]["clockSpeed"];
						else echo 'NA'; ?></td>
				</tr>
			<?php $i++;
			endforeach; ?>
		</tbody>
	</table>
</body>