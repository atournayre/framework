# Installation

This guide will help you install the library in your project.

## Requirements

* PHP 8.2.22 or higher
* Composer

## Installation

Add the library to your existing project using Composer:

```bash
composer require atournayre/framework
```

## Automatic Upgrades

The framework provides Rector sets for automatic updates during version upgrades. 
To use these sets, you can install the `atournayre/rector-auto-upgrade` package:

```bash
composer require --dev atournayre/rector-auto-upgrade
```

You may need to add an entry in the `config.allow-plugins` section of your `composer.json` if it's not done automatically:

```json
{
    "config": {
        "allow-plugins": {
            "atournayre/rector-auto-upgrade": true
        }
    }
}
```

This package will help you automatically upgrade your code when updating to a new version of the framework.

## Usage

After installation, you can use the library in your project by importing the necessary classes.

For more information on how to use the library, please refer to the Usage section of this documentation.
