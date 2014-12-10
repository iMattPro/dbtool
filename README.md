## ![alt text](http://mattfriedman.me/forum/images/database_check_1.png "DB Tool") Database Optimize & Repair Tool (for phpBB3)

This is an extension for phpBB 3.1 that will allow you to check, optimize and repair phpBB's MySQL database tables from a phpMyAdmin-like interface in the Administration Control Panel.

[![Build Status](https://travis-ci.org/VSEphpbb/dbtool.png)](https://travis-ci.org/VSEphpbb/dbtool)

## Features
* Optimize, Repair and Check tables directly from the ACP
* Select individual or all tables independently
* Displays table size and table overhead values
* Option to safely disable board during the optimize/repair process
* Actions are logged to the Admin log
* Nice javascript interactions

## Requirements
* phpBB 3.1.0-RC2 or higher
* PHP 5.3.3 or higher
* MySQL 4.0.1 or higher (using MyISAM, InnoDB or Archive table types)

## Installation
1. [Download the latest release](https://github.com/VSEphpbb/dbtool/releases) and unzip it.
2. Copy the entire contents from the unzipped folder to `phpBB/ext/vse/dbtool/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Find Database Optimize & Repair Tool under "Disabled Extensions" and click `Enable`.

## Usage
After installation, you can find the Optimize & Repair Tool in:

`ACP -> Maintenance -> Database -> Optimize & Repair`.

> You use this extension at your own risk! There have been cases with certain shared web hosts where a database table could crash for a very large forum. This extension will perform the same functions on your database as phpMyAdmin, so if you have been using phpMyAdmin on your database with no problems, then it should be safe to use this extension. It is always safest to run a backup of your database before performing any Optimize or Repair functions just in case anything goes wrong.

> Note: InnoDB table types do not support the Repair option.

## Uninstallation
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for Database Optimize & Repair Tool.
3. To permanently uninstall, click `Delete Data`, then delete the `dbtool` folder from `phpBB/ext/vse/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2013 - Matt Friedman (VSE)
