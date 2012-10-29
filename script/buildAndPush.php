#!/usr/bin/env php
<?php


$rootDir  = __DIR__ . '/../../';
$composerBin = $rootDir . 'composer.phar';
$satisDir = $rootDir . 'satis';
$magentoComposerRepositorySourceDir = $rootDir . 'magentoPackagistSource';
$magentoComposerRepositoryBuildDir  = $rootDir . 'magentoPackagistBuild';


chdir($magentoComposerRepositorySourceDir);
passthru("git pull ");

chdir($magentoComposerRepositoryBuildDir);
passthru("git pull");

chdir($rootDir);

passthru("php {$satisDir}/bin/satis build {$magentoComposerRepositorySourceDir}/satis.json {$magentoComposerRepositoryBuildDir}/");

chdir($magentoComposerRepositoryBuildDir);
passthru("git add .");
passthru("git commit -a -m \"updated repository by Buildscript\" ");

//passthru("git push --dry-run");
passthru("git push");

