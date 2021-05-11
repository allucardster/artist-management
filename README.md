Artist Management
=================
Celebrity management API with database update logs feature.

Requirements
============
- Docker (>= 18.x)
- Docker Compose (>= 1.20)
- Make

Technology Stack
================
- Composer 2.0.x
- PHP 7.4
- Symfony 4.4
- PostgreSQL 13.2
- Nginx 1.x

Development Setup
=================
- Init docker containers
```sh
:~$ make up
```
- Install dependencies
```sh
:~$ make composer-install
```
- Init database (drop and create database. execute migrations )
```sh
:~$ make database-init
```
- Generate JWT SSL keys
```sh
:~$ make jwt-generate-keypair
```
- The following are the user information to `login` and test the api (`Security section at API docs`)
```
-----------------------------------------------------
ROLE_ADMIN
-----------------------------------------------------
username: admin
password: admin
-----------------------------------------------------

-----------------------------------------------------
ROLE_USER
-----------------------------------------------------
username: user_1, user_2, user_3
password: passwd123
-----------------------------------------------------
```
Documentation
=============
- [API Docs](https://documenter.getpostman.com/view/5093068/TzRShTC2)

About Database Logs Feature
===========================
The database logs feature was implemented using the [Doctrine Lifecycle Subscribers](https://symfony.com/doc/current/doctrine/events.html#doctrine-lifecycle-subscribers) because the `postUpdate` event allow get the required information (entity, changes and security users) in a single place.

In other hand, there are some pitfalls with this implementation:
- The subscriber resolve all the information and in case it fails, the entire process fails. (i.e update a celebrity)
- The `logs` data is stored in the same database where the changes are performed.

A way to deal with this is try to use some `queue` to process the subscriber data afterwards. Also, should be good move all the logs process (create, list etc) into a `microservice`.

Contributors
============
- Richard Melo [Twitter](https://twitter.com/allucardster), [Linkedin](https://www.linkedin.com/in/richardmelo)