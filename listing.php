<?php 
require 'app/start.php';

$objects= $s3->getIterator('ListObjects',[
'Bucket' => $config['s3']['bucket']
]);

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
	
			<tr>
				<td></td>
				<td></td>
			</tr>
		<?php endforeach;?>
	</tbody>
	</table>

</body>