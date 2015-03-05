# Web Service Layer
### A project from [Eduardo Destruti](http://destruti.com/)

###WebSite [webservicelayer.com](http://webservicelayer.com/)
only a web presentation to explain how the system works layers.
but website already using WSL structure to get your informations. clone and study project to understand.

###Service Layer [webservicelayer.info](http://webservicelayer.info/)
This project was created to demonstrate the use of a PHP Micro Framework Slim using calls Restfull APIs to make data management.
This layer should be brought to power websites or mobile applications.
we don't create correctly restful methods because our intention was integrate finally with a JS layer. but if you need is a easy and simple work.

To complement the complexity and velocity of the project was implemented one NoSql MongoDB database layer.
This project have a folder called dump/
if you need a example database is only execute in your local database.

###JS WebServiceLayer Examples

[JS Link Package Example](http://webservicelayer.com/js/church/)

This project intends to carry out communication between four layers.
To integrate all the tips of a non-relational database mongodb with a JS layer with jquery ajax requests, we created two files to be integrated into any website.
According to the Jquery reference, are not all browsers that accept PUT and DELETE Rest calls.
and to call have some security, we must call all informations with a client key.
At this case, all JS integration must send in modified HEADERS to POST.

## What is a Web Service Layer?

A services is an abstraction layer placed on top of the domain model which encapsulates common application logic behind a single API.
That it can be easily consumed by different client layers, including a new JS layer model.

![WebServiceLayer Exp.](http://webservicelayer.com/img/v2/WebServiceLayer_explanation.png)

#Example Usage

##[Example Page -> http://webservicelayer.com/example/](http://webservicelayer.com/examples/church/)

We developed a page with the complete integration of all layers to make it simple to understand the project.
All calls must have a client key. In this example, we use a example client "church", put in a input type hidden of html file.

> <input type="hidden" id="hashClient" value="church">

![webservicelayer.Exemp1](http://webservicelayer.com/img/v2/html.png)

This example works only with .html and .js files, without any back-end language.

![webservicelayer.Exemp1](http://webservicelayer.com/img/ex_1.png)

![webservicelayer.Exemp2](http://webservicelayer.com/img/ex_2.png)

![webservicelayer.Exemp2](http://webservicelayer.com/img/ex_3.png)


##Install Features

###Install Curl
> sudo apt-get install curl

###Install Composer
> curl -sS https://getcomposer.org/installer | php

> sudo mv composer.phar /usr/local/bin/composer


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

###To finish

> mongorestore /path/to/dump/folder/

> sudo a2enmod headers

> sudo /etc/init.d/apache2 restart

> composer install

###UnitTest

>phpunit tests/



#Usage: Go to Work!

Oh right! Let's find out how this RestFull API application works in practice:

##Need to Add?
> curl -i -X POST -H 'Content-Type: application/json' -d '{"campaign": "Natal 2015", "pr_name": "Ari", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.info/addWorship

##Need to Update? (Change for current _id)
> curl -i -X PUT -H 'Content-Type: application/json' -d '{"_id": "54f37889479ed0ad188b4567", "campaign": "Natal 2015", "pr_name": "Ari Palmeiras", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.info/updateWorship

##Need to Delete? (Change for current _id)
> curl -i -X DELETE -H 'Content-Type: application/json' -d '{"_id": "54f3822d479ed0b0188b4567"}' http://webservicelayer.info/deleteWorship