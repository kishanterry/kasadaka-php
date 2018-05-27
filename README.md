# VoiceXML in PHP

## Introduction
This is a very rudimentary version of a part of KasaDaka framework implemented in Laravel PHP Framework.
- The groundwork has been done to generate VXML files (refer file https://github.com/kishanterry/kasadaka-php/blob/master/app/VoiceXml.php)
- KasaDaka backend GUI needs to be coded.

## Setup
- Provision a machine with Linux OS (preferable a version of Ubuntu)
- Follow the instructions [here](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04) to install Nginx, MySQL, PHP.
- Install Composer (PHP dependency manager, like `pip` for Python) as instructed [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

Git should be installed by default on any Linux machines.

- `git clone https://github.com/kishanterry/kasadaka-php.git` to download this project into the server.
- `cd kasadaka-php`
- `composer install` to install all the various dependencies of the application.
- Edit the Nginx configuration files to appropriately setup DNS names. [Documentation here](http://nginx.org/en/docs/beginners_guide.html).

## Demo
This particular application is already hosted at [http://ict4d.gotamey.com](http://ict4d.gotamey.com) - Web UI and [http://ict4d.gotamey.com/vxml](http://ict4d.gotamey.com/vxml) VoiceXML implementation.
