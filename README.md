# fox91 PHP Coding Standards

[![Latest version](https://img.shields.io/packagist/v/fox91/coding-standard.svg?colorB=007EC6)](https://packagist.org/packages/fox91/coding-standard)
[![Downloads](https://img.shields.io/packagist/dt/fox91/coding-standard.svg?colorB=007EC6)](https://packagist.org/packages/fox91/coding-standard)
[![Build status](https://github.com/fox91/php-coding-standard/workflows/php-ci/badge.svg?branch=main)](https://github.com/fox91/php-coding-standard/actions?query=workflow%3Aphp-ci+branch%3Amain)

Compatible with PHP `7.4`, `8.0` and `8.1`.

## Included tools

- [PHP_CodeSniffer](https://packagist.org/packages/squizlabs/php_codesniffer)
    + [`dealerdirect/phpcodesniffer-composer-installer`](https://packagist.org/packages/dealerdirect/phpcodesniffer-composer-installer): PHP_CodeSniffer Standards Composer Installer
    + [`pheromone/phpcs-security-audit`](https://packagist.org/packages/pheromone/phpcs-security-audit): finds vulnerabilities and weaknesses related to security
    + [`sirbrillig/phpcs-import-detection`](https://packagist.org/packages/sirbrillig/phpcs-import-detection): look for unused or unimported symbols
    + [`sirbrillig/phpcs-variable-analysis`](https://packagist.org/packages/sirbrillig/phpcs-variable-analysis): detect problems with variables
    + [`slevomat/coding-standard`](https://packagist.org/packages/slevomat/coding-standard): complements Consistence Coding Standard by providing sniffs with additional checks
    + [`phpcompatibility/php-compatibility`](https://packagist.org/packages/phpcompatibility/php-compatibility): checks for PHP cross-version compatibility

## Optional tools

- [`pheromone/phpcs-security-audit`](https://packagist.org/packages/pheromone/phpcs-security-audit): finds vulnerabilities and weaknesses related to security in PHP code

## Installation

```bsh
composer require --dev fox91/coding-standard
```

Create a file named `.phpcs.xml.dist` in the root of your project:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset>
    <!-- https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-Ruleset -->
    <!-- https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage -->

    <arg name="extensions" value="php"/>
    <arg name="tab-width" value="4"/>
    <arg name="basepath" value="."/>
    <arg name="parallel" value="80"/>
    <arg name="report" value="full"/>
    <arg name="cache" value=".phpcs.cache"/>

    <arg value="s"/>

    <file>src</file>
    <file>tests</file>

    <config name="ignore_warnings_on_exit" value="1"/>
    <config name="ParanoiaMode" value="1"/>

    <!-- PHPCompatibility config -->
    <!-- <config name="testVersion" value="7.4"/> -->

    <rule ref="Fox91CodingStandard"/>
    <!-- <rule ref="Fox91CodingStandardStrict"/> -->
</ruleset>
```
