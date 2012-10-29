#!/usr/bin/env php
<?php


$rootDir  = __DIR__ . '/../../';
$composerBin = $rootDir . 'composer.phar';
$satisDir = $rootDir . 'satis';
$magentoComposerRepositorySourceDir = $rootDir . 'magentoPackagistSource';
$magentoComposerRepositoryBuildDir  = $rootDir . 'magentoPackagistBuild';

chdir($rootDir);

passthru("wget http://getcomposer.org/composer.phar -O $composerBin");
passthru("php $composerBin create-project --keep-vcs composer/satis $satisDir");

passthru("git clone git@github.com:magento-hackathon/composer-repository.git $magentoComposerRepositorySourceDir");
chdir($magentoComposerRepositorySourceDir);
passthru("git checkout master");

passthru("cp -rf $magentoComposerRepositorySourceDir $magentoComposerRepositoryBuildDir");

chdir($magentoComposerRepositoryBuildDir);

passthru("git checkout  gh-pages");

#passthru("git clone git://github.com/composer/satis.git $satisDir");
#chdir($satisDir);
#passthru("composer");