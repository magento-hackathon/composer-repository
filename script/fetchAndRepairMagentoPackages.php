#!/usr/bin/env php
<?php

$packages = array(
	'http://connect20.magentocommerce.com/community/Lib_Google_Checkout/1.5.0.0/Lib_Google_Checkout-1.5.0.0.tgz',
	'http://connect20.magentocommerce.com/community/Lib_Phpseclib/1.5.0.0/Lib_Phpseclib-1.5.0.0.tgz',
	'http://connect20.magentocommerce.com/community/Lib_ZF/1.11.1.0/Lib_ZF-1.11.1.0.tgz'
);

$rootDir  = __DIR__ . '/../repairedConnectPackages/';

chdir($rootDir);

foreach( $packages as $package ){

	$packageFileName = basename($package);
	$packageName = basename($package,'.tgz');
	echo "Downloading " . $package . PHP_EOL;
	passthru("curl -O $package");
	passthru("mkdir $packageName");
	passthru("tar -xzf $packageFileName -C ./{$packageName}");
	chdir($packageName);
	passthru("tar -czf {$rootDir}/fixed_{$packageFileName} ./*");
	chdir($rootDir);

}

