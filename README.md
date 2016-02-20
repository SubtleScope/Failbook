# Failbook - A vulnerable web app

## Authors
- Nathan Wray (m4dh4tt3r)
- Andrew Myers

## Contributors
- Justin Wray, Flags and Development
- Benjamin Heise, Flags and Development

## Description
- Failbook is a vulnerable web application (app) used for training and educational purposes. Failbook was designed to simulate social networking web apps - similar in look to Facebook with a messaging platform similar to that of Twitter.

- Failbook has since been modified to be more of a CTF-esque environment with Flags and Flag Submission (Just checks whether you found a legitimate flag or not)

## Requirements
- Ubuntu 13.04
- LAMP: PHP 5.4.9, MySQL 5.5.34, and Apache 2.2.22
- php5-mysql, php5-common, bind 9.9.2-P1, and php5-cli 
	
- Note: Failbook was built shortly after the release of Ubuntu 13.04. While newer versions of the software exist, to maintain the web app's vulnerable state, we have not upgraded Failbook. Much of the code is depricated in newer versions of php.
	
## VM Configuration
- Failbook was built minimally with the following specs:
  - 1 GB RAM
  - 1 Processor
  - 8 GB HDD

## WebApp Configuration
- Failbook was designed with the following:
  - HTTP and HTTPS support
  - User Registration, Text/Image Posting, Profile Images
  - Post Searching
  - Admin Portal
  - DNS configured, Points to failbook.com
  - Web App configured with static 192.168.1.134 address

## Credentials
- Ubuntu Credentials: failbook/failbook
- Failbook Admin Credentials: tom/tomisnumber1!
- Database Credentials: failuser/failuser

## Installation
Note: Failbook is being released with 2 archives, 1 with flags and the other with just the core Failbook files.
Likewise, the Failbook VM has been released with the flags built-in, so it can be used as a CTF-esque training tool.

The instructions below, describe how to deploy Failbook from the archives. 

- Install the "No Flags" version
  - sudo su -
  - apt-get install php5 php5-mysql mysql-server apache2
  - cd /var/www/
  - tar xvzf failbook-v1.6-no-flags.tar.gz
  - cp -R etc/apache2/* /etc/apache2/
  - cp -R etc/ssl/certs/* /etc/ssl/certs/
  - cp -R etc/bind/* /etc/bind/
  - rm -rf etc/

  - service bind9 restart
  - service apache2 restart

  - mysql -u [user] -p
  - create database failbook;
  - exit;
  - mysql -u [user] -p failbook < failbook.sql
  - service mysql restart

  - Navigate http://[Failbook IP | failbook.com]/ or https://[Failbook IP | failbook.com]/

  - Create a user, login as Tom
  - You are ready to go!

- Install the "Flag" version
  - sudo su -
  - apt-get install php5 php5-mysql mysql-server apache2
  - cd /root/
  - tar xvzf failbook-v1.6-with-flags.tar.gz
  - cp -R etc/apache2/* /etc/apache2/
  - cp -R etc/ssl/certs/* /etc/ssl/certs/
  - cp -R etc/bind/* /etc/bind/
  - cp -R var/www/* /var/www/
  - mkdir -p /var/www2/
  - cp -R var/www2/* /var/www2/
  - cp -R home/failbook/* /home/failbook/
  - cp -R root/ /root/
  - rm -rf etc/ var/ home/ root/
  
  - service bind9 restart
  - service apache2 restart

  - mysql -u [user] -p
  - create database failbook;
  - exit;
  - mysql -u [user] -p failbook < failbook.sql
  - service mysql restart

  - Navigate http://[Failbook IP | failbook.com]/ or https://[Failbook IP | failbook.com]/

  - Create a user, login as Tom
  - You are ready to go!
	
## userGen Script
- Failbook comes with a script to generate users - can be generate random users either legitimate looking users or junk users
	
- Example Usage:
  - ./userGen.sh -real -n 1000 -t https://failbook.com -u 

## Screenshots
- Faibook: <br />
![Failbook](/screenshots/Failbook.jpg?raw=true "Failbook") <br />
- Login: <br />
![Login](/screenshots/FailbookLogin.jpg?raw=true "Login") <br />
- Password Reset: <br />
![Reset](/screenshots/FailbookLogin.jpg?raw=true "Reset") <br />

## License	
Failbook - A Vulnerable Web Application Platform
Copyright (C) 2015 Andy Meyers, Nathan Wray (m4dh4tt3r)

This file is part of Failbook.

Failbook is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Failbook is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Failbook.  If not, see <http://www.gnu.org/licenses/>.
