# Web Service Layer

## A project from Eduardo Destruti

This project is a concept of layer
to atend websites, mobile apps and others.

## What is a Service?

A services is an abstraction layer placed on top of the domain model which encapsulates common application logic behind a single API so that it can be easily consumed by different client layers.

![WebServiceLayer](http://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2012/02/service_diagram.png)

## Install Features

> sudo apt-get install curl

> curl -sS https://getcomposer.org/installer | php

> mv composer.phar /usr/local/bin/composer


> sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 7F0CEB10

> echo 'deb http://downloads-distro.mongodb.org/repo/ubuntu-upstart dist 10gen' | sudo tee /etc/apt/sources.list.d/mongodb.list

> sudo apt-get update

> sudo apt-get install -y mongodb-org

> sudo apt-get install -y mongodb-org=2.6.1 mongodb-org-server=2.6.1 mongodb-org-shell=2.6.1 mongodb-org-mongos=2.6.1 mongodb-org-tools=2.6.1


> echo "mongodb-org hold" | sudo dpkg --set-selections

> echo "mongodb-org-server hold" | sudo dpkg --set-selections

> echo "mongodb-org-shell hold" | sudo dpkg --set-selections

> echo "mongodb-org-mongos hold" | sudo dpkg --set-selections

> echo "mongodb-org-tools hold" | sudo dpkg --set-selections






###Composer.json
> 
> { 

>    "require": {

>         "phpunit/phpunit": "4.7.*@dev",

>         "phpunit/phpunit-selenium": "dev-master",

>         "phpunit/dbunit": "1.3.*@dev"

>     }

> }

>
> composer install
> 

Live Action? [Clique aqui](http://webservicelayer.com/)
