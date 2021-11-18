## ![alt text](https://imattpro.github.io/logo/database_check_1.png "DB Tool") Database Optimize & Repair Tool for phpBB

A phpBB extension that will allow you to check, optimize and repair phpBB's MySQL database tables from a phpMyAdmin-like interface in the Administration Control Panel or from the CLI.

[![Build Status](https://github.com/iMattPro/dbtool/workflows/Tests/badge.svg)](https://github.com/iMattPro/dbtool/actions)
[![codecov](https://codecov.io/gh/iMattPro/dbtool/branch/master/graph/badge.svg?token=hlMnGtSzhE)](https://codecov.io/gh/iMattPro/dbtool)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/iMattPro/dbtool/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/iMattPro/dbtool/?branch=master)
[![Maintainability](https://api.codeclimate.com/v1/badges/3327f9379160c72b3b59/maintainability)](https://codeclimate.com/github/iMattPro/dbtool/maintainability)
[![Latest Stable Version](https://poser.pugx.org/vse/dbtool/v/stable)](https://www.phpbb.com/customise/db/extension/database_optimize_and_repair_tool/)

## Features
* Optimize, Repair and Check tables directly from the ACP or the CLI
* Select individual tables or all tables at once
* Displays table size and table overhead values in the ACP
* Option to safely disable board during the optimize/repair process
* Results are logged to the Admin log
* Enhanced javascript interactions

## Minimum Requirements
* phpBB 3.2.0
* PHP 5.4 or higher
* MySQL 4.0.1 or higher (using MyISAM, InnoDB or Archive table types)

## Install
1. [Download the latest validated release](https://www.phpbb.com/customise/db/extension/database_optimize_and_repair_tool/).
2. Unzip the downloaded release and copy it to the `ext` directory of your phpBB board.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Find `Database Optimize & Repair Tool` under Disabled Extensions and click `Enable`.

## Usage
After installation, you can find the Optimize & Repair Tool in:

`ACP -> Maintenance -> Database -> Optimize & Repair`.

> Use this extension at your own risk! There have been cases with certain shared web hosts where a database table could crash for a very large forum. This extension will perform the same functions on your database as phpMyAdmin, so if you have been using phpMyAdmin on your database with no problems, then it should be safe to use this extension. It is always safest to run a backup of your database before performing any Optimize or Repair functions just in case anything goes wrong.

> Note: InnoDB table types do not support the Repair option.

## CLI Usage
The Optimize & Repair Tool can also be run from the command line interface in 
phpBB using the `db:tool` command. The tool will prompt you to choose an operation:
Optimize, Repair, or Check.

To check, optimize or repair all tables:

`$ php bin/phpbbcli.php db:tool`

To check, optimize or repair a specific table:

`$ php bin/phpbbcli.php db:tool table_name`

To disable the board during an operation, use the `--disable-board` or `-D` option:

`$ php bin/phpbbcli.php db:tool --disable-board`

For help with the Optimize & Repair Tool command:

`$ php bin/phpbbcli.php db:tool --help`

## Uninstall
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for Database Optimize & Repair Tool.
3. To permanently uninstall, click `Delete Data`, then delete the `dbtool` folder from `phpBB/ext/vse/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2013 - Matt Friedman
