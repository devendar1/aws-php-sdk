<?php

require 'vendor/autoload.php';
use Aws\Ec2\Ec2Client;

static $resultAvailability;

$ec2Client = new Aws\Ec2\Ec2Client([
    'region' => 'us-west-2',
    'version' => 'latest',
    'profile' => 'default'   
]);
$result = $ec2Client->describeRegions();

// var_dump($result ["Regions"]);
// exit();

foreach ($result["Regions"] as $region)
{
$ec2Client = new Aws\Ec2\Ec2Client([
    'region' => $region["RegionName"],
    'version' => 'latest',
    'profile' => 'default'
]);
$resultAvailability[] = $ec2Client->describeAvailabilityZones();
}

$size = count($resultAvailability);
// echo $size;
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
		  <?php for($i=0;$i< $size; $i++):?>
		  <?php foreach($resultAvailability[$i]["AvailabilityZones"] as $AvailabilityZone): ?>
			<tr>
				<td><?php echo $AvailabilityZone['RegionName']; ?></td>
				<td><?php echo $AvailabilityZone["ZoneName"]; ?></td>
			</tr>
			<!-- <?php  var_dump($AvailabilityZone)?> -->
		  <?php endforeach; ?>		 
		  <?php endfor;?>
	</tbody>
	</table>

</body>
