# lumen-oauth2-nginx-multiDB-docker
PHP7 newest technologies revision to create REST API.

* APP API
    - PHP 7
    - Composer
    - Lumen 5 framework
	- Simple API protected by OAUTH2 Proxy to OAUTH2 Server (TODO: Cache Authorizied Request)
	- Doctrine ORM with multi DB configuration (PgSql) and Doctrine ODM with (MongoDb) to DDD implementations, disitributed roots entities
	- Swagger 3.0 documentation (http://api.mmilko.git/api/documentation)
    - TODO: Fractal transformations Doctrine Collection to Lumen Collection
    - TODO: Schema configuration dump to file
* Oauth2 Server
    - PHP 7 
    - Composer
    - Lumen 5 framework
    - Laravel 5 Passport Library
    - Eloquent ORM with Mysql

* Nginx Server
    - multi domain

* Docker environment
    -  containers - separation of concerns
    -  network for local host
    
* Git  version control system

* Angular 4 - client for API with credentials

