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
- php5-mysql, php5-common, and php5-cli 
	
- Note: Failbook was built shortly after the release of Ubuntu 13.04. While newer versions of the software exist, to maintain the web app's vulnerable state, we have not upgraded Failbook.
	
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

- Install the required software
  - apt-get install php5 php5-mysql mysql-server apache2
- Download the failbook archive
- Untar the archive in /var/www/
  - cd /var/www/; tar xvzf /path/to/failbook-vX.X.X-targ.gz
- Create the failbook database
  - mysql -u [user] -p
  - create database failbook;
  - exit;
- Import the Failbook Database
  - mysql -u [user] -p failbook < failbook.sql
- Restart services
  - service apache2 restart
  - service mysql restart
- Navigate to Failbook
  - https://[Failbook IP]/
- Login as Tom/Register for an account
  - Tom's credentials are tom/tomisnumber1!
- You are ready to go!
	
## userGen Script
- Failbook comes with a script to generate users - can be generate random users either legitimate looking users or junk users
	
- Usage:
  - ./userGen.sh -real -n 1000 -t https://failbook.com -u 

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
