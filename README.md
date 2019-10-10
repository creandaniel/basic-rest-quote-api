basicrestapi
============

#A Symfony project created on September 5, 2019, 11:18 am.


#RESTful API built to store quotes into a MySQL database. Fetches data and returned as JSON response. 

#Prerequisites

# PHP 7.2 (not tested on earlier)
#Route and Method Bundles
Composer (need to ensure to run composer:require and composer:update, in order to use symfony libraries.

# How to use

# 1. Start server via commaond: php bin/console server:start
# 2. Use any of following URLs below:

#2.1 Adding an quote

http://127.0.0.1:8000/api/v1/quote?quote=an injured friend is the bitterest of foes&source=google&author=thomas+jefferson&author_profession=unknown&genre=focus&country_origin=UKKKK

#2.2 Update a quote

#http://127.0.0.1:8000/api/v1/quote/update/1?quote=hewholaughswins&source=cnn

#2.3 Delete an quote


#3.4 Get all quotes (via Pagination)

http://127.0.0.1:8000/api/v1/allquotes?pageNo=2

#3.5 get an quote 

http://127.0.0.1:8000/api/v1/quote/1

# How to install DATABASE

1. Via commandline (in linux) use:
php bin/console doctrine:database:create
php bin/console doctrine:schema:createphp bin/console doctrine:schema:create



