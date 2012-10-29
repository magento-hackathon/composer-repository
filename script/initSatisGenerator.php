#!/usr/bin/env php
<?php


$rootDir  = __DIR__ . '/../../';
$composerBin = $rootDir . 'composer.phar';
$satisDir = $rootDir . 'satis';
$magentoComposerRepositorySourceDir = $rootDir . 'magentoPackagistSource';
$magentoComposerRepositoryBuildDir  = $rootDir . 'magentoPackagistBuild';

chdir($rootDir);

echo "Downloading composer.phar to " . realpath($rootDir) . PHP_EOL;
//passthru("wget http://getcomposer.org/composer.phar -O $composerBin");
passthru("curl -O http://getcomposer.org/composer.phar");

echo "Installing satis in " . realpath($satisDir) . PHP_EOL;
passthru("php $composerBin create-project --keep-vcs composer/satis $satisDir");

echo "Cloning module composer-repository source to " . realpath($magentoComposerRepositorySourceDir) . PHP_EOL;
passthru("git clone git@github.com:magento-hackathon/composer-repository.git $magentoComposerRepositorySourceDir");
chdir($magentoComposerRepositorySourceDir);
passthru("git checkout master");

echo "Creating module composer-repository build at " . realpath($magentoComposerRepositorySourceDir) . PHP_EOL;
passthru("cp -rf $magentoComposerRepositorySourceDir $magentoComposerRepositoryBuildDir");

chdir($magentoComposerRepositoryBuildDir);

passthru("git checkout  gh-pages");

#passthru("git clone git://github.com/composer/satis.git $satisDir");
#chdir($satisDir);
#passthru("composer");