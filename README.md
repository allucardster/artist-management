Artist Management
=================

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

Contributors
============
- Richard Melo [Twitter](https://twitter.com/allucardster), [Linkedin](https://www.linkedin.com/in/richardmelo)