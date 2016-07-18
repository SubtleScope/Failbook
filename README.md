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
  - You will need to configure the database password of your choosing in common.php, Failbook was designed with insecurity in mind, so the original build had the services and files running and owned by root. Likewise, the database connection used the root login with no password. Feel free to change this to whatever you'd like.

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

## Notes

- Domain Name
  - Failbook is configured to use the domain failbook.com with a static IP of 192.168.1.134. If you are using 
    Failbook out of the box, then you need to use this. Otherwise, you can modify the bind configurations to 
    use the IP address that you want.
  - If you are using the default implementation, then you will need to set your DNS address to 192.168.1.134
    in order for failbook.com to resolve properly as well as having your host in the 192.168.1.0/24 address 
    space.

  - failbook.com is not owned by the authors and is used in this readme as a placeholder for how to configure 
    and use the commands in your local faibook instance.
  - This project has no affilitation with the real failbook.com.
  - Please do not attack the real failbook.com. The authors of this project are not responsible or liable for 
    your actions. Please follow your local, state, federal, and international laws. You are responisble for your
    own actions, please act responsibly. 

- Looking to find the flags?
  - A list of the available flags is listed in the flag_lists.txt

- Stuck on a challenge? Can't find a flag?
  - Sometimes you get stuck, it happens. While I normally wouldn't release this walkthrough, it has been requested by Failbook 
    users.
  - Please, do yourself a favor and try to work through the flags, it will make you better in the end; however, if you're stuck
    and can't get passed a challenge, this guide will help.
  - The guide goes through a possible way to solve each flag. There are many different ways they can be solved, so if you find
    a way and want to share, feel free to do so.
  - Most importantly, have fun and keep honing your skills - for good and not evil. Also, only on systems you own or are approved
    to test. Never use these skills against a system that you are not authorized to access or test. We are not responsible or
    liable for using these methods against systems that are not your own. We are not liable if you break your own system either.
    So be careful with running commands and files that people have shared on websites as they can be dangerous. 

## userGen Script
- Failbook comes with a script to generate users - the generated users can be either random users or legitimate looking users.

  The users are generated and then "post" to the website with a random post message. The script can be used to generate users
  and have them post to the website. It can also be used to promote a certain user's post, promoting it to the top liked post.

  Update: 18 July 2016, added support to turn on SSL support when running Failbook over HTTPS
	
- Example Usage:
  - ./userGen.sh -h

  - ./userGen.sh -real -n 1000 -t failbook.com -u 

  - Sample legitimate users:

    Command: ./userGen.sh -real -n 10 -t failbook.com -s -u

    First Name: Louise
    Last Name: Rowe

    First Name: Iluminada
    Last Name: Gallagher

  - Sample random users:

    Command: ./userGen.sh -rand -n 10 -t failbook.com -s -u

    First Name: l95kcD4X
    Last Name: l95kcD4X

    First Name: 2dPsevHm
    Last Name: 2dPsevHm

## Screenshots
- Faibook: <br />
![Failbook](/screenshots/Failbook.jpg?raw=true "Failbook") <br />
- Login: <br />
![Login](/screenshots/FailbookLogin.jpg?raw=true "Login") <br />
- Password Reset: <br />
![Reset](/screenshots/FailbookReset.jpg?raw=true "Reset") <br />
- Public View 1: <br />
![Public View 1](/screenshots/PublicView1.jpg?raw=true "Public View 1") <br />
- Public View 2: <br />
![Public View 2](/screenshots/PublicView2.jpg?raw=true "Public View 2") <br />

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
