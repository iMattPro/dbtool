##![alt text](http://mattfriedman.me/forum/images/database_check_1.png "DB Tool") Database Optimize & Repair Tool (for phpBB3)

This is an extension for phpBB 3.1 that will allow you to check, optimize and repair phpBB's database tables from a phpMyAdmin-like interface in the Administration Control Panel.

[![Build Status](https://travis-ci.org/VSEphpbb/dbtool.png?branch=master)](https://travis-ci.org/VSEphpbb/dbtool)

##Features
- Optimize, Repair and Check tables directly from the ACP
- Select individual or all tables independently
- Displays table size and table overhead values
- Option to safely disable board during the optimize/repair process
- Actions are logged to the Admin log
- Nice javascript interactions

##Requirements
- phpBB 3.1-dev or higher
- PHP 5.3.3 or higher
- MySQL 4.0.1 or higher (using MyISAM, InnoDB or Archive table types)

##Installation
You can install this on the latest copy of the develop branch ([phpBB 3.1-dev](https://github.com/phpbb/phpbb3)) by following the steps below:

1. Copy the entire contents of this repo to `phpBB/ext/vse/dbtool/`
2. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
3. Click `Enable`.

You can install this on the latest copy of the develop branch ([phpBB 3.1-dev](https://github.com/phpbb/phpbb3)) by following the steps below:

##Usage
After installation, you can find the Optimize & Repair Tool in `ACP -> Maintenance -> Database -> Optimize & Repair`. 

> You use this extension at your own risk! There have been cases with certain shared web hosts where a database table could crash for a very large forum. This extension will perform the same functions on your database as phpMyAdmin, so if you have been using phpMyAdmin on your database with no problems, then it should be safe to use this extension. It is always safest to run a backup of your database before performing any Optimize or Repair functions just in case anything goes wrong.

Note: InnoDB table types do not support the Repair option.

##Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Extensions` and click `Disable`.

To permanently uninstall, click `Delete Data` and then you can safely delete the `/ext/vse/dbtool` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2013 - Matt Friedman (VSE)
