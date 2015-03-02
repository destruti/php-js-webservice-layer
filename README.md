# Web Service Layer

## A project from [Eduardo Destruti](http://destruti.com/)

###Web View [webservicelayer.com](http://webservicelayer.com/)
only a web presentation to explain how the system works layers

###WebApi [webservicelayer.info](http://webservicelayer.info/)
This project was created to demonstrate the use of a PHP Micro Framework Slim using calls Restfull APIs to make data management.
This layer should be brought to power websites or mobile applications.

To complement the complexity of the project was implemented one NoSql MongoDB database layer.
The next step will be to implement unit tests.



## What is a Web Service Layer?

A services is an abstraction layer placed on top of the domain model which encapsulates common application logic behind a single API so that it can be easily consumed by different client layers.

![WebServiceLayer Exp.](http://webservicelayer.com/img/WebServiceLayer_explanation.png)

##Install Features

###Install Curl
> sudo apt-get install curl

###Install Composer
> curl -sS https://getcomposer.org/installer | php

> mv composer.phar /usr/local/bin/composer


###Install MongoDb
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

###Install PHP - MongoDb
> sudo pecl install mongo

> sudo vim /etc/php5/apache2/php.ini

> extension=mongo.so

###Done?
> sudo /etc/init.d/apache2 restart

> composer install



##Need to view?
![WebServiceLayer View](http://webservicelayer.com/img/view_database.png)

##Need to Add?
> curl -i -X POST -H 'Content-Type: application/json' -d '{"campaign": "Natal 2015", "pr_name": "Ari", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.com/addWorship

##Need to Update? (Change for current _id)
> curl -i -X PUT -H 'Content-Type: application/json' -d '{"_id": "54f37889479ed0ad188b4567", "campaign": "Natal 2015", "pr_name": "Ari Palmeiras", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.com/updateWorship

##Need to Delete? (Change for current _id)
> curl -i -X DELETE -H 'Content-Type: application/json' -d '{"_id": "54f3822d479ed0b0188b4567"}' http://webservicelayer.com/deleteWorship
