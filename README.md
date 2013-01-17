# Magento Module Composer Repository #

The URL of the repository is [packages.firegento.com](http://packages.firegento.com/).

For further information on how to use composer for Magento modules, please visit the [Magento Composer Installer](https://github.com/magento-hackathon/magento-composer-installer) project.

This Repository uses [Satis](https://github.com/composer/satis).
We probably should switch to a custom packagist repository instead of satis, but that requires more dedicated setup time and infrastructure.
If you happen to want to sponsor that, please let us know.

## Want your Magento module published? ##

1. Add a modman file to your module
2. Add a `composer.json` to your module
3. Create a pull request for the `satis.json`

Hint: Satis recognizes only annotated tags (`git tag -a`) as versions.

## Building the packages.json ##
You don't need this if you only want to have your module published...

- `php bin/satis build satis.json <build-dir>`
- Copy the updated files to the `gh-pages`-branch and push them
