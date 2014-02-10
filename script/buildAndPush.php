#!/usr/bin/env php
<?php


$rootDir  = __DIR__ . '/../../';
$composerBin = $rootDir . 'composer.phar';
$satisDir = $rootDir . 'satis';
$magentoComposerRepositorySourceDir = $rootDir . 'magentoPackagistSource';
$magentoComposerRepositoryBuildDir  = $rootDir . 'magentoPackagistBuild';
$lockFile = $magentoComposerRepositorySourceDir . '/build.lock';
$lockTimeout = 60 * 60; // Max validity of a lockfile in seconds


if (file_exists($lockFile)) {
    if (time() - filectime($lockFile) < $lockTimeout) {
        $lockFile = implode('/', array_slice(explode('/', realpath($lockFile)), -3));
        echo "Lockfile ...{$lockFile} exists, quitting.\n";
        exit();
    }
    unlink($lockFile); // Lockfile is stale
}
touch($lockFile);

chdir($magentoComposerRepositorySourceDir);
passthru("git pull ");

chdir($magentoComposerRepositoryBuildDir);
passthru("git pull");

chdir($rootDir);

passthru("php -d memory_limit=265M {$satisDir}/bin/satis build {$magentoComposerRepositorySourceDir}/satis.json {$magentoComposerRepositoryBuildDir}/");

chdir($magentoComposerRepositoryBuildDir);
passthru("git add .");
passthru("git commit -a -m \"Updated repository by Buildscript\" ");

//passthru("git push --dry-run");
passthru("git push");

unlink($lockFile);
