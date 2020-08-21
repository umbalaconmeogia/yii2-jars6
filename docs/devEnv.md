# Build developing environment

## Overview

This document memos steps to prepare development environment for the first time for yii2 extension *umbalaconmeogia/yii2-jars6* ([Github](https://github.com/umbalaconmeogia/yii2-jars6)).

*yii2-jars6* is an extension that provide a *module* which contains controller and migration functions.

To test while developing this extension in local, I use *yii2-devmyext* ([Github](https://github.com/umbalaconmeogia/yii2-devmyext)) application, which is used for testing my extensions.

## Prepare the code base

Pull code of *yii2-devmyext* and *umbalaconmeogia/yii2-jars6*, put them in same directory level.

Run migration of yii2-devmyext so it can run.

## Config yii2-devmyext commposer

Open yii2-devmyext composer.json, adding information into *repositories* and *requires* as below.

```php
    "require": {
        // Other stuffs.

        "umbalaconmeogia/yii2-jars6": "@dev"
    },

    "repositories": [
        // Other stuffs.

		{
            "type": "path",
            "url": "../../yii2-jars6",
            "symlink": true
        }
    ]
```

Run *composer* to link yii2-jars6 to *vendor* directory of yii2-devmyext.

```shell
$ composer update umbalaconmeogia/yii2-jars6

Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing umbalaconmeogia/yii2-jars6 (dev-master): Junctioning from ../../yii2-jars6
Writing lock file
Generating autoload files
```

## Config yii2-devmyext configuration file

Define module *yii2-jars6* in *yii2-devmyext* web/consile configuration.
```php
    'modules' => [
        // Other stuffs.

        'jars6' => [
            'class' => 'umbalaconmeogia\jars6\Module',
        ],
    ],
```

## Test it

Now you can access to yii2-jars6 UI screen via
http://localhost/yii2-devmyext/src/web/index.php/jars6/expense/index
(the domain depends on your local web server configuration).