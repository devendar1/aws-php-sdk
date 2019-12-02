<?php


require 'vendor/autoload.php';

use Aws\Ec2\Ec2Client;

$ec2Client = new Aws\Ec2\Ec2Client([
    'region' => 'us-west-2',
    'version' => 'latest',
    'profile' => 'default',
    'request.options' => ['proxy' => '193.56.47.20:8080']
]);

$result = $ec2Client->describeRegions();
// var_dump($result["Regions"][0]);

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
			<th>End point</th>
		</tr>
	</thead>
	<tbody>
		<!-- var_dump($result["Regions"][0]); -->
		  <?php foreach($result["Regions"] as $region): ?>

		  	<?php var_dump($region); ?>
		 
			<tr>
				<td><?php echo $region["RegionName"]; ?></td>&nspb&nspb&nspb&nspb&nspb&nspb&nspb
				<td><?php echo $region["Endpoint"]; ?></td>
			</tr>
		  <?php endforeach;?>
	</tbody>
	</table>

</body>
