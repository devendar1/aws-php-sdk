<?php

require 'vendor/autoload.php';

use Aws\Ec2\Ec2Client;

$ec2Client = new Aws\Ec2\Ec2Client([
	'request.options' => ['proxy' => '193.56.47.20:8080'],
    'region' => 'us-west-2',
    'version' => 'latest',
    'profile' => 'default'   
]);

$result = $ec2Client->describeRegions();

// var_dump($result ["Regions"]);

foreach ($result["Regions"] as $region){

$ec2Client = new Aws\Ec2\Ec2Client([
    'region' => $region["RegionName"],
    'version' => 'latest',
    'profile' => 'default'
]);



$resultAvailability = $ec2Client->describeAvailabilityZones();
}
// var_dump($resultAvailability);


 
 

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
			<th>Region name</th>
			<th>Availablity Zones</th>
		</tr>
	</thead>
	<tbody>
		<!-- var_dump($result["Regions"][0]); -->
		  <?php foreach($resultAvailability["AvailabilityZones"] as $AvailabilityZone): ?>

		  	<!-- <?php var_dump($region); ?> -->
		 
			<tr>
				<td><?php echo $AvailabilityZone["RegionName"]; ?></td>
				<td><?php echo $AvailabilityZone["ZoneName"]; ?></td>
			</tr>
		  <?php endforeach;?>
	</tbody>
	</table>

</body>
