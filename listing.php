<?php 
use Aws\S3\S3Client;
require 'app/start.php';
// use Aws\Exception\AwsException;
// $objects= $s3->getIterator('ListObjects',[
// 		'Bucket' => $config['s3']['bucket']
// ]);



$options = [
    'region'            => 'us-west-2',
    'version'           => '2006-03-01',
    'signature_version' => 'v4'
];

$s3Client = new S3Client($options);
var_dump(s3Client);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listing</title>
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
		<?php foreach ($objects as $object): ?> 
		var_dump($objects);
			<tr>
				<td></td>
				<td></td>
			</tr>
		<?php endforeach;?>
	</tbody>
	</table>

</body>