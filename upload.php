<?php

require 'app/start.php';

if(isset($_FILES['file'])){

	$file =$_FILES['file'];

	//file details
	$name = $file['name'];
	$tmp_name =$file['tmp_name'];

	$extention = explode('.', $name);
	$extention = strtolower(end($extention));

	//Temp details

	$key =md5(uniqid());
	$tmp_file_name = "{$key}.{$extention}";
	$tmp_file_path = "files/{$tmp_file_name}";
 	 
 	 //Move files
	move_uploaded_file($tmp_name, $tmp_file_path);

	try {

		$s3->putObject([
			'Bucket' => $config['s3']['bucket'],
			'Key' 	 => "uploads/{$name}",
			'Body'   => fopen($tmp_file_path, 'rb'),
			'ACL'    => 'public-read'
		]);

		var_dump($s3);

		//Remove the file
		unlink($tmp_file_path);

	} catch (S3Exception $e){
		die("there was an error uploading that file.");
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	

	<meta charset="utf-8">
	<title>Upload</title>
</head>
<body>
	<form action="upload.php" method ="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" value="Upload">
	</form>
</body>