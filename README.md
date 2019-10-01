basicrestapi
============

#A Symfony project created on September 5, 2019, 11:18 am.


#RESTful API built to store quotes into a MySQL database. Fetches data and returned as JSON response. 

#Prerequisites

# PHP 7.2 (not tested on earlier)
#Route and Method Bundles

# HttpFoundation (it uses request and response namespacing)

# How to use

# 1. Start server via commaond: php bin/console server:start
# 2. 

#2.1 Adding an quote

#127.0.0.1:8000/api/v1/quote?quote=an injured friend is the bitterest of foes&source=thomas+jefferson

#2.2 Update a quote

#http://127.0.0.1:8000/api/v1/quote/update/1?quote=hewholaughswins&source=cnn

#2.3 Delete an quote


#3.4 Get all quotes (via Pagination)

#//TODO http://127.0.0.1:8000/api/v1/allquotes?pageNo=2

#3.5 get an quote 

# http://127.0.0.1:8000/api/v1/quote/1





