# fox91 PHP Coding Standards

[![Latest version](https://img.shields.io/packagist/v/fox91/coding-standard.svg?colorB=007EC6)](https://packagist.org/packages/fox91/coding-standard)
[![Downloads](https://img.shields.io/packagist/dt/fox91/coding-standard.svg?colorB=007EC6)](https://packagist.org/packages/fox91/coding-standard)
[![Build status](https://github.com/fox91/php-coding-standard/workflows/php-ci/badge.svg?branch=main)](https://github.com/fox91/php-coding-standard/actions?query=workflow%3Aphp-ci+branch%3Amain)

Compatible with PHP `7.3`, `7.4` and `8.0`.

## Included tools

- PHP_CodeSniffer
    + `dealerdirect/phpcodesniffer-composer-installer`
    + `pheromone/phpcs-security-audit`
    + `sirbrillig/phpcs-import-detection`
    + `sirbrillig/phpcs-variable-analysis`
    + `slevomat/coding-standard`
    + `phpcompatibility/php-compatibility`

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

    <rule ref="Fox91CodingStandard"/>
</ruleset>
```
