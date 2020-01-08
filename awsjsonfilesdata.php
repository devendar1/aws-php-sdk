<?php

require 'vendor/autoload.php';

$url = 'https://pricing.amazonaws.com/offers/v1.0/aws/index.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
foreach ($response["offers"] as $offer)
	// var_dump($offer["offerCode"]);
	// exit();
	$size = count($response["offers"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>MasterdataAWS</title>
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
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($response["offers"] as $offer) : ?>
				<tr>
					<td><?php echo $i; ?>
					<td><?php echo $offer["offerCode"]; ?></td>
					<td><?php echo $offer["versionIndexUrl"]; ?></td>
					<td><?php echo $offer["currentVersionUrl"]; ?></td>
					<td><?php echo $offer["currentRegionIndexUrl"]; ?></td>
				</tr>
			<?php $i++;
			endforeach; ?>
		</tbody>
	</table>
</body>