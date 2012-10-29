# Magento Composer Repository #

This Repository uses [Satis](https://github.com/composer/satis).

## Want your Magento module published? ##

1. Add a modman file to your module
2. Add a `composer.json` to your module
3. Create a pull request for the `satis.json`

## Building the packages.json ##
You don't need this if you only want to have your module published...

- `php bin/satis build satis.json <build-dir>`
- Copy the updated files to the `gh-pages`-branch and push them
