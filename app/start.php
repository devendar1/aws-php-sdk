<?php

use Aws\S3\S3Client;

require 'vendor/autoload.php';

$config = require('config.php');

//s3

$s3 = S3Client::factory([
	'profile' => 'default',
	'request.options' => ['proxy' => '193.56.47.20:8080'],
	'region'=>'us-west-2',
	'version' => 'latest'
]);

